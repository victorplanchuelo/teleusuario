<?php

namespace App\Http\Controllers;

use App\Repositories\Services;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


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
	 * Show the application dashboard.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$success=1;
		$strErr='';
		$message=[];
		return view('dashboard.messages', compact('success','message','strErr'));
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
		$created_note = json_decode($this->services->postCreateNote($request['texto'], $request['conversacion_chat'])->getBody()->getContents());

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
	 * @param Request $request
	 * @return \Illuminate\Http\JsonResponse
	 *
	 * Función que será llamado cuando se envíe (el mensaje, guiño, ...)
	 * Provisionalmente se está haciendo sólo para mensaje
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
}
