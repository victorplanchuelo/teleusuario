<?php

namespace App\Repositories;

use Illuminate\Support\Facades\Auth;

class Services extends APIRepository
{
	protected $token_seguridad = 'jjashegdg127352782hdhwhge9eyexy2gshdjfg9477ykjhfdsgds737shsdhf';



	/*
	 * PARTE API PARA MENSAJES
	 */

	/**
	 * Get a selected number of message Ids, random or not,
	 * from a selected date and a given "Animadora"
	 *
	 * @param $num
	 * @param $fecha
	 * @param $aleatorio
	 * @return mixed|\Psr\Http\Message\ResponseInterface
	 */
	public function getIdsMessages($num, $fecha, $aleatorio) {

		//Aqui devolveremos la vista del home del dashboard
		//con las llamadas a API necesarias
		return $this->get('bandeja_entrada_obtener_conversaciones_premium_aleatorio',
			[
				'animadora' => Auth::user()->code,
				'num_mensajes' => $num,
				'fecha' => $fecha,
				'aleatorio' => $aleatorio,
			]
		);

	}

	public function getRandomMessage($arrMsg)
	{
		//De un array de mensajes dado, escogemos uno aleatoriamente
		$rand_keys = array_rand($arrMsg, 1);
		return $arrMsg[$rand_keys];
	}

	/**
	 * Get all data from given message
	 * @param $conversation_id
	 * @return mixed|\Psr\Http\Message\ResponseInterface
	 */
	public function getDataMessage($conversation_id)
	{
		return $this->post('bandeja_entrada_leer_conversacion_premium_nuevo_teleusuario',
			[
				'conversacion' => $conversation_id,
				'teleusuario_nuevo' => 1,
			]
		);
	}

	/**
	 * Create a new note for this conversation.
	 * @var String $texto
	 * @var String $conversacion
	 * @return Integer
	 */
	public function postCreateNote($texto, $conversacion_chat, $nombre_premium, $nombre_cliente,
									$foto_premium, $foto_cliente, $anuncio_premium, $anuncio_cliente,
									$ciudad_premium, $ciudad_cliente, $provincia_premium, $provincia_cliente,
									$enlace_premium, $enlace_cliente, $usuario_premium, $usuario_cliente)
	{


		$premium = [
			'nombre' => $nombre_premium,
			'foto' => $foto_premium,
			'anuncio' => $anuncio_premium,
			'ciudad' => $ciudad_premium,
			'provincia' => $provincia_premium,
			'enlace' => $enlace_premium,
			'usuario' => $usuario_premium,
			'premium' => 1,
			'animadora' => Auth::user()->code,
		];

		$cliente = [
			'nombre' => $nombre_cliente,
			'foto' => $foto_cliente,
			'anuncio' => $anuncio_cliente,
			'ciudad' => $ciudad_cliente,
			'provincia' => $provincia_cliente,
			'enlace' => $enlace_cliente,
			'usuario' => $usuario_cliente,
			'premium' => 0,
			'animadora' => 0,
		];


		return $this->post('chat_guardar_nota_conversacion_nuevo_teleusuario',
			[
				'texto' => $texto,
				'conversacion' => $conversacion_chat,
				'token_seguridad' => $this->token_seguridad,
				'origen' => $premium,
				'destino' => $cliente,
				'animadora' => Auth::user()->code,
			]
		);
	}

	/**
	 * Send new message to a client
	 * @var String $animadora
	 * @var String $texto
	 * @var String $conversacion
	 * @var Integer $guinyo
	 * @return Integer
	 */
	public function postSendMessage($texto, $conversacion, $guinyo)
	{
		return $this->post('bandeja_entrada_enviar_mensaje_premium_nuevo_teleusuario',
			[
				'animadora' => Auth::user()->code,
				'texto' => $texto,
				'conversacion' => $conversacion,
				'guinyo' => $guinyo,
			]
		);
	}

	/**
	 * Send the private key to the user
	 * @param $conversacion
	 * @return mixed|\Psr\Http\Message\ResponseInterface
	 */
	public function postSendPrivateKey($conversacion, $autonoma, $cliente)
	{
		return $this->post('bandeja_entrada_enviar_llave_privada',
			[
				"id_conversacion" => $conversacion,
				"id_anuncio_autonoma" => $autonoma,
				"id_anuncio_cliente" => $cliente,
				"animadora" => Auth::user()->code,

			]
		);
	}


	/*
	 * PARTE API PARA GUINYOS
	 */

	/**
	 * Get all data from wink (could be given wink or not)
	 * @param num_winks
	 * @param $id_animadora
	 * @param $wink_id
	 * @return mixed|\Psr\Http\Message\ResponseInterface
	 */
	public function getDataWink($num_winks, $id_animadora, $wink_id=0)
	{
		return $this->post('guinyo_obtener_guinyo_nuevo_teleusuario',
			[
				'animadora' => $id_animadora,
				'num_guinyos' => $num_winks,
				'id_guinyo' => $wink_id,
			]
		);
	}



	/*
	 * PARTE API PARA CHATS
	 */
	/**
	 * Update the entertainer last connection into database
	 *
	 * @param $user
	 * @return mixed|\Psr\Http\Message\ResponseInterface
	 */
	public function postLastConnEntertainer($user)
	{
		return $this->post('chat_actualizar_ultima_conexion_animadora',
			[
				"animadora" => $user,

			]
		);
	}

	/**
	 * Update the Premium Connection
	 *
	 * @param $user
	 * @param $ip
	 * @return mixed|\Psr\Http\Message\ResponseInterface
	 */
	public function postUpdatePremiumConnection($user, $ip)
	{
		return $this->post('chat_actualizar_conexion_premium',
			[
				"animadora" => $user,
				"ip" => $ip,

			]
		);
	}


	/**
	 * Load chat conversation
	 *
	 * @param $conversation
	 * @param $video_chat
	 * @param $user
	 * @return mixed|\Psr\Http\Message\ResponseInterface
	 */
	public function postLoadConversation($conversation, $video_chat, $user)
	{
		return $this->post('chat_cargar_conversacion_nuevo_teleusuario',
			[
				"animadora" => $user,
				"conversacion" => $conversation,
				"video_chat" => $video_chat,
				"nuevo_teleusuario" => 1,

			]
		);
	}


	/**
	 * VIDEOCHAT
	 *
	 * @param $conversation
	 * @return mixed|\Psr\Http\Message\ResponseInterface
	 */
	public function postVideoChat($conversation)
	{
		return $this->post('chat_token_video_nuevo_teleusuario',
			[
				"conversacion" => $conversation,
			]
		);
	}


	/**
	 * Send Chat Message
	 *
	 * @param $conversation
	 * @param $message_text
	 * @param $user
	 * @param $photo
	 * @param $name
	 * @param $uic
	 * @param $reversed
	 * @param $entertainer
	 * @return mixed|\Psr\Http\Message\ResponseInterface
	 */
	public function postSendChatMessage($conversation, $message_text, $user, $photo, $name, $uic, $reversed, $entertainer)
	{
		return $this->post('chat_enviar_mensaje_nuevo_teleusuario',
			[
				"conversacion" => $conversation,
				"texto_mensaje" => $message_text,
				"usuario" => $user,
				"foto" => $photo,
				"nombre" => $name,
				"uic" => $uic,
				"revertida" => $reversed,
				"animadora" => $entertainer,
			]
		);
	}


	/**
	 * Mark message as read
	 *
	 * @param $message
	 * @param $conversation
	 * @return mixed|\Psr\Http\Message\ResponseInterface
	 */
	public function postMarkMessageAsRead($message, $conversation)
	{
		return $this->post('chat_marcar_mensaje_leido_nuevo_teleusuario',
			[
				"conversacion" => $conversation,
				"mensaje" => $message,
				"token_seguridad" => $this->token_seguridad,
			]
		);
	}

	/**
	 * Create Chat Note
	 *
	 * @param $note
	 * @param $conversation
	 * @return mixed|\Psr\Http\Message\ResponseInterface
	 */
	public function postCreateChatNote($note, $conversation)
	{
		return $this->post('chat_guardar_nota_conversacion_nuevo_teleusuario',
			[
				"conversacion" => $conversation,
				"texto" => $note,
				"animadora" => Auth::user()->code,
				"token_seguridad" => $this->token_seguridad,
			]
		);
	}

	/**
	 * Getting Reversed Chats
	 *
	 * @return mixed|\Psr\Http\Message\ResponseInterface
	 */
	public function postReversedChat()
	{
		return $this->post('chat_obtener_chat_revertido_nuevo_teleusuario',
			[
				"animadora" => Auth::user()->code,
				"token_seguridad" => $this->token_seguridad,
			]
		);
	}

	/**
	 * Getting Disconnected Reversed Chats
	 *
	 * @return mixed|\Psr\Http\Message\ResponseInterface
	 */
	public function postDisconnectedReversedChat()
	{
		return $this->post('chat_obtener_chat_revertido_desconectado_nuevo_teleusuario',
			[
				"animadora" => Auth::user()->code,
				"token_seguridad" => $this->token_seguridad,
			]
		);
	}

	/**
	 * Close Chat
	 *
	 * @param $conversation
	 * @param $premium
	 * @param $client
	 * @return mixed|\Psr\Http\Message\ResponseInterface
	 */
	public function postCloseChatConversation($conversation, $premium, $client)
	{
		return $this->post('chat_cerrar_conversacion_nuevo_teleusuario',
			[
				"id_conversacion" => $conversation,
				"token_seguridad" => $this->token_seguridad,
				"cliente" => $client,
				"premium" => $premium,
			]
		);
	}
}