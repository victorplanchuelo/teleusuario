<?php

namespace App\Http\Controllers;

use App\Repositories\Services;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use phpDocumentor\Reflection\Types\Integer;


class ServiceController extends Controller
{
	protected $services;


	/**
	 * Create a new controller instance.
	 * @param Services $services
	 */
	public function __construct(Services $services)
	{
		$this->services = $services;
		$this->middleware('auth');
	}

	/**
	 * Recupera X mensajes (indicados por parámetro por la tarea a realizar)
	 * Una vez recuperados los Ids de esas conversaciones se elegirá una al azar y se mostrarán sus mensajes
	 * Aparte estos datos quedan guardados en la session
	 *
	 * AÑADIDO EL 1 de JUNIO de 2017
	 * Se ha creado un listener que saltará cuando se pulse el botón de comenzar la tarea. Si en la session ya
	 * estan cargados los IDs, no debe lanzar el evento
	 */
	public function getMessage()
	{
		$success=1;

		if(!session()->has('conversacion_actual'))
		{
			$idsMessages = json_decode($this->services->getIdsMessages(1, 20170401, 0)->getBody()->getContents());

			if($idsMessages->success !=1)
			{
				$success=0;
				$strErr = trans('dashboard.task.message.conversation.error');
			}

			//Aqui hemos obtenido los ids de las conversaciones
			//Máximo num. de conversaciones - El número pasado por parámetro

			//Guardamos en sesión/cache
			session()->put('conversacion_actual', $idsMessages->conversations[0]);
			session()->save();
		}

		$id = session()->get('conversacion_actual');

		$message = json_decode($this->services->getDataMessage($id)->getBody()->getContents());

		return view('dashboard.messages', compact('success', 'message', 'strErr'));
	}


	/**
	 * Función que será llamada una vez se haya contestado un mensaje
	 * Recuperará otro ID de mensaje y mostrará los nuevos datos por pantalla
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function getNewMessage()
	{
		$success=1;
		if(session()->has('conversacion_actual'))
		{
			session()->forget('conversacion_actual');
		}


		$idsMessages = json_decode($this->services->getIdsMessages(1, 20170401, 0)->getBody()->getContents());

		if($idsMessages->success !=1)
		{
			$success=0;
			$strErr = trans('dashboard.task.message.conversation.error');
		}

		//Aqui hemos obtenido los ids de las conversaciones
		//Máximo num. de conversaciones - El número pasado por parámetro

		//Guardamos en sesión/cache
		session()->put('conversacion_actual', $idsMessages->conversations[0]);
		session()->save();

		$id = session()->get('conversacion_actual');

		$message = json_decode($this->services->getDataMessage($id)->getBody()->getContents());

		return view('main.inc.task.message', compact('success', 'message', 'strErr'));
	}

	/**
	 * Función que será llamado cuando se envíe (el mensaje, guiño, ...)
	 * Provisionalmente se está haciendo sólo para mensaje
	 *
	 * @param Request $request
	 * @return \Illuminate\Http\JsonResponse
	 *

	 */
	public function postMessages(Request $request)
	{
		$strErr ='';
		$messages = [
			'texto.required' => trans('validation.custom.task.messages.message.required'),
			'texto.min' => trans('validation.custom.task.messages.message.min'),
		];

		$validator = Validator::make($request->all(), [
			'texto' => 'required|min:4',
		], $messages);

		if ($validator->fails()) {
			return response()->json([
				'success' => 0,
				'error' => $validator->errors()->all(),
			]);
		}

		//Si supera la validación se puede enviar el mensaje con los parámetros que se nos pide desde el servicio
		$send_msg = json_decode($this->services->postSendMessage($request['texto'], session('conversacion_actual'), 0)->getBody()->getContents());

		$success = ($send_msg->exito <= 0) ? 0 : 1 ;

		if($success <= 0)
		{
			$strErr = trans('dashboard.task.message.send_message.error') . ' ERROR - '. $send_msg->error;
		}


		//Si se ha enviado correctamente el mensaje, borramos el id de la conversación actual (ya que ha sido terminada)
		//Habría que comprobar si

		return response()->json([
			'success' => $success,
			'error' => [$strErr],
			'strDate' => Carbon::now()->format('d/m/Y'),
		]);
	}

	/**
	 * Función que se encarga de crear las notas de la conversación
	 *
	 * @param Request $request
	 * @return \Illuminate\Http\JsonResponse
	 *
	 * Función llamada cuando el usuario escriba una nueva nota
	 * sobre la conversación
	 */
	public function postCreateNote(Request $request)
	{
		$strErr = '';

		$messages = [
			'texto.required' => trans('validation.custom.task.messages.note.required'),
			'texto.min' => trans('validation.custom.task.messages.note.min'),
		];

		$validator = Validator::make($request->all(), [
			'texto' => 'required|min:4',
		], $messages);

		if ($validator->fails()) {
			return response()->json([
				'success' => 0,
				'error' => $validator->errors()->all(),
			]);
		}

		//Si pasa la validación pasamos los datos al servicio.
		//OJO, si conversación viene como 0 es que no tiene chat creado con el usuario (habrá que ver como hacerlo en el servicio)
		//-----------------------------------------------------------------------------------------------------------------------------------
		//OJO. Como segundo parámetro se le pasa el ID DE LA CONVERSACION DE CHAT
		// que es diferente al Id de la conversación
		//-----------------------------------------------------------------------------------------------------------------------------------
		$created_note = json_decode($this->services->postCreateNote(
			$request['texto'],
			$request['conversacion_chat'],
			$request['nombre_cliente'],
			$request['nombre_premium'],
			$request['foto_premium'],
			$request['foto_cliente'],
			$request['anuncio_premium'],
			$request['anuncio_cliente'],
			$request['ciudad_premium'],
			$request['ciudad_cliente'],
			$request['provincia_premium'],
			$request['provincia_cliente'],
			$request['enlace_premium'],
			$request['enlace_cliente'],
			$request['usuario_premium'],
			$request['usuario_cliente']
		)->getBody()->getContents());

		$success = ($created_note->exito <= 0) ? 0 : 1 ;

		if($success <= 0)
		{
			$strErr = trans('dashboard.task.message.create_note.error');
		}

		return response()->json([
			'success' => $success,
			'error' => [$strErr],
			'strDate' => Carbon::now()->format('d/m/Y'),
		]);

	}

	/**
	 * Función encargada de mandar la Llave privada en los mensajes
	 *
	 * @param Request $request
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function postSendPrivateKey(Request $request)
	{
		$strErr='';
		$strAlert=trans('dashboard.messages.form.pkey.success');

		//Si supera la validación se puede enviar el mensaje con los parámetros que se nos pide desde el servicio
		$sendPKey = json_decode($this->services->postSendPrivateKey(session('conversacion_actual'), $request['autonoma'], $request['cliente'])->getBody()->getContents());

		$success = ($sendPKey->exito <= 0) ? 0 : 1 ;

		if($success <= 0)
		{
			$strAlert = trans('dashboard.messages.form.pkey.error') . ' ERROR - '. $sendPKey->error;
			$strMsg='';
		}
		else
		{
			$strMsg = trans('dashboard.messages.form.pkey.msg_success');
		}


		//Si se ha enviado correctamente el mensaje, borramos el id de la conversación actual (ya que ha sido terminada)
		//Habría que comprobar si

		return response()->json([
			'success' => $success,
			'alert' => $strAlert,
			'message' => $strMsg,
			'strDate' => Carbon::now()->format('d/m/Y'),
		]);
	}




	/*
	 * PARA LA PARTE DE GUIÑOS
	 */

	/**
	 * Función que se encarga de mostrar un guiño (SIN TERMINAR)
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function getWink()
	{
		$wink_id = (session()->has('guinyo_actual')) ? session()->get('guinyo_actual') : 0;
		$wink = json_decode($this->services->getDataWink(1, Auth::user()->code, $wink_id)->getBody()->getContents());

		if($wink->success !=1)
		{
			$success=0;
			$strErr = trans('dashboard.task.wink.conversation.error');
			$wink='';
		}
		else
		{
			$success=1;
			$strErr='';
			$wink = $wink->guinyo[0];

			//Guardamos en sesión/cache
			session()->put('guinyo_actual', $wink->id_guinyo);
			session()->save();

		}

		return view('dashboard.winks',  compact('success', 'wink', 'strErr'));
	}




	/*
	 * PARA LA PARTE DE CHATS
	 */

	/**
	 * Función que muestra la página de Chats
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function getChats()
	{
		return view('dashboard.chats');
	}



	//////// DENTRO DEL APARTADO CHATS ESTAS SON LAS LLAMADAS AJAX
	/**
	 * Función que controla la última conexión de la Animadora
	 * Será lanzada cada 200 segundos (5 minutos)
	 *
	 * @param Request $request
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function postLastConnEntertainer(Request $request)
	{
		$strErr='';
		$update_last_conn= json_decode($this->services->postLastConnEntertainer(Auth::user()->code)->getBody()->getContents());

		$success = ($update_last_conn->exito <= 0) ? 0 : 1 ;

		if($success <= 0)
		{
			$strErr = trans('dashboard.task.chats.update_last_conn_entertainer.error') . ' ERROR - '. trans($update_last_conn->error);
		}


		return response()->json([
			'success' => $success,
			'error' => [$strErr],
		]);
	}

	/**
	 * Función encargada de Actualizar la conexión de la premium cada 200 segundos (5 minutos)
	 *
	 * @param Request $request
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function postUpdatePremiumConnection(Request $request)
	{
		//SE DEBE PASAR EL CODIGO DE LA AUTONOMA Y LA IP
		$ip = $request->ip();
		$strErr='';
		$update_premium_conn= json_decode($this->services->postUpdatePremiumConnection(Auth::user()->code, $ip)->getBody()->getContents());

		$success = ($update_premium_conn->exito <= 0) ? 0 : 1 ;

		if($success <= 0)
		{
			$strErr = trans('dashboard.task.chats.update_premium_connection.error') . ' ERROR - '. trans($update_premium_conn->error);
		}

		return response()->json([
			'success' => $success,
			'error' => [$strErr],
		]);
	}

	/**
	 * Función encargada de cargar la conversación
	 *
	 * @param Request $request
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function postLoadConversation(Request $request)
	{
		$conversation = $request['conversacion'];
		$video_chat = $request['video_chat'];

		$strErr='';
		$load_conversation= json_decode($this->services->postLoadConversation($conversation, $video_chat, Auth::user()->code)->getBody()->getContents());

		$success = ($load_conversation->exito <= 0) ? 0 : 1 ;

		$html_fila='';
		$segundos_quedan=0;
		$token_video_chat='';
		if($success <= 0)
			$strErr = trans('dashboard.task.chats.load_conversation.error') . ' ERROR - '. trans($load_conversation->error);
		else
		{
			$html_fila=$load_conversation->html_fila;
			$segundos_quedan=$load_conversation->segundos_quedan;
			$token_video_chat = $load_conversation->token_video_chat;
		}


		return response()->json([
			'success' => $success,
			'error' => [$strErr],
			'html_fila' => $html_fila,
			'segundos_quedan' => $segundos_quedan,
			'token_video_chat' => $token_video_chat,
		]);
	}

	/**
	 * Función encargada del VideoChat
	 *
	 * @param Request $request
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function postVideoChat(Request $request)
	{
		$conversation = $request['conversacion'];

		$strErr='';
		$videochat= json_decode($this->services->postVideoChat($conversation)->getBody()->getContents());

		$success = ($videochat->exito <= 0) ? 0 : 1 ;
		$token='';
		if($success <= 0)
		{
			$strErr = trans('dashboard.task.chats.video_chat.error') . ' ERROR - '. trans($videochat->error);
		}
		else
			$token = $videochat->token;


		return response()->json([
			'success' => $success,
			'error' => [$strErr],
			'token' => $token,
		]);
	}

	/**
	 * Función encargada del envío de mensajes por Chat
	 *
	 * @param Request $request
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function postSendChatMessage(Request $request)
	{
		$conversation = $request['conversacion'];
		$message_text = $request['texto_mensaje'];
		$user = $request['usuario'];
		$photo = $request['foto'];
		$name = $request['nombre'];
		$uic = $request['uic'];
		$reversed = $request['revertida'];
		$entertainer = Auth::user()->code;

		$strErr='';
		$send_message= json_decode($this->services->postSendChatMessage($conversation, $message_text, $user, $photo, $name, $uic, $reversed, $entertainer)->getBody()->getContents());

		$success = ($send_message->exito <= 0) ? 0 : 1 ;


		$segundos_duracion=0;
		$mensaje=[];
		if($success <= 0)
		{
			$strErr = trans('dashboard.task.chats.send_chat_message.error') . ' ERROR - '. trans($send_message->error);
		}
		else
		{
			$segundos_duracion=$send_message->mensaje->segundos_duracion;
			$mensaje=$send_message->mensaje;
		}


		return response()->json([
			'success' => $success,
			'error' => [$strErr],
			'segundos_duracion' =>$segundos_duracion,
			'mensaje' => $mensaje,
		]);
	}

	/**
	 * Función que controla el marcar el mensaje como leído
	 *
	 * @param Request $request
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function postMarkMessageAsRead(Request $request)
	{
		$strErr='';

		$message = $request['mensaje'];
		$conversation = $request['conversacion'];

		$read_message = json_decode($this->services->postMarkMessageAsRead($message, $conversation)->getBody()->getContents());

		$success = ($read_message->exito <= 0) ? 0 : 1 ;

		if($success <= 0)
		{
			$strErr = trans('dashboard.task.chats.mark_message_as_read.error') . ' ERROR - '. trans($read_message->error);
		}


		return response()->json([
			'success' => $success,
			'error' => [$strErr],
		]);
	}

	/**
	 * Función que controla el crear una nota de chat
	 *
	 * @param Request $request
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function postCreateChatNote(Request $request)
	{
		$strErr='';

		$note = $request['texto'];
		$conversation = $request['conversacion'];

		$create_note = json_decode($this->services->postCreateChatNote($note, $conversation)->getBody()->getContents());

		$success = ($create_note->exito <= 0) ? 0 : 1 ;

		if($success <= 0)
			$strErr = trans('dashboard.task.chats.create_chat_note.error') . ' ERROR - '. trans($create_note->error);

		return response()->json([
			'success' => $success,
			'error' => [$strErr],
		]);
	}

	/**
	 * Función que controla la obtención de los chats revertidos
	 *
	 * @param Request $request
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function postReversedChat(Request $request)
	{
		$strErr='';
		$opciones=[];
		$conversacion=0;

		$reversed = json_decode($this->services->postReversedChat()->getBody()->getContents());

		$success = ($reversed->exito <= 0) ? 0 : 1 ;

		if($success <= 0)
			$strErr = trans('dashboard.task.chats.reversed_chat.error') . ' ERROR - '. trans($reversed->error);
		else
		{
			//SI DEVUELVE EXITO RECUPERAMOS LOS DATOS QUE NECESITAMOS
			$conversacion = $reversed->conversacion;
			$opciones = $reversed->opciones;
		}


		return response()->json([
			'success' => $success,
			'error' => [$strErr],
			'conversacion' => $conversacion,
			'opciones' => $opciones,
		]);
	}

	/**
	 * Función que controla la obtención de los chats revertidos desconectados
	 *
	 * @param Request $request
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function postDisconnectedReversedChat(Request $request)
	{
		$strErr='';
		$conversacion=0;

		$disconn_reversed = json_decode($this->services->postDisconnectedReversedChat()->getBody()->getContents());

		$success = ($disconn_reversed->exito <= 0) ? 0 : 1 ;

		if($success > 0)
			$conversacion = $disconn_reversed->conversacion;

		return response()->json([
			'success' => $success,
			'error' => [$strErr],
			'conversacion' => $conversacion,
		]);
	}

	/**
	 * Función que controla el cierre del chat (de una conversación)
	 *
	 * @param Request $request
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function postCloseChatConversation(Request $request)
	{
		$strErr='';

		$close_chat = json_decode($this->services->postCloseChatConversation($request['id_conversacion'], $request['premium'], $request['cliente'])->getBody()->getContents());

		$success = ($close_chat->exito <= 0) ? 0 : 1 ;

		if($success <= 0)
			$strErr = trans('dashboard.task.chats.disconnected_reversed_chat.error') . ' ERROR - '. trans($close_chat->error);

		return response()->json([
			'success' => $success,
			'error' => [$strErr],
		]);
	}



	/*
	 *
	 * ESTO ES PARA EL MUROPOST
	 * SE HA HECHO ANTES PARA PODER PROGRAMAR LOS HTMLs DE LOS CHATS
	 *
	 */
	public function getMuropost()
	{
		$success=1;
		$strErr='';

		return view('dashboard.muropost', compact('success', 'strErr'));
	}



	/*
	 * ESTO ES PARA LA PARTE DE LOS NOVIOS
	 */
	public function getBoyfriends()
	{
		$success=1;
		$strErr='';

		return view('dashboard.boyfriends', compact('success', 'strErr'));
	}

	public function getLoadBoyfriends()
	{
		$success=1;
		$strErr='';

		//Se llama al servicio para saber si tiene novios. Los valores recuperados se mostrarán por pantalla
		//Si no tiene novios o ya se han escrito a todos tendrá un caso especial, ya que contendrá un texto
		// con variables dinámicas y hay que estructurar la frase
		$boyfriends = json_decode($this->services->getBoyfriends()->getBody()->getContents());

		if($boyfriends->exito !=1)
		{
			$success=0;

			if($boyfriends->error2 > 0)
				$strErr='';
			else
				$strErr = trans($boyfriends->error);
		}

		return response()->json([
			'success' => $success,
			'error' => [$strErr],
			'boyfriends' => $boyfriends,
		]);
	}

	public function getLoadConversationBoyfriend(Request $request)
	{
		$anuncio_cliente = $request['anuncio_cliente'];
		$anuncio_premium = $request['anuncio_premium'];

		$success=1;
		$strErr='';


		$conversacion = json_decode($this->services->getIdConversation($anuncio_premium, $anuncio_cliente)->getBody()->getContents());


		if($conversacion->id > 0)
			$message = json_decode($this->services->getDataMessage($conversacion->id)->getBody()->getContents());
		else
		{
			$message='';
			$success=0;
			$strErr = ['No se ha podido obtener el mensaje'];
		}


		return response()->json([
			'success' => $success,
			'error' => [$strErr],
			'message' => $message,
		]);


	}
}
