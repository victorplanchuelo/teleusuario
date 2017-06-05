<?php

namespace App\Repositories;

use Illuminate\Support\Facades\Auth;
use phpDocumentor\Reflection\Types\Integer;

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
		return $this->post('bandeja_entrada_leer_conversacion_premium',
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
	public function postCreateNote($texto, $conversacion_chat)
	{
		return $this->post('chat_guardar_nota_conversacion',
			[
				'texto' => $texto,
				'conversacion' => $conversacion_chat,
				'token_seguridad' => $this->token_seguridad,
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



	/*
	 * PARTE API PARA GUINYOS
	 */

	/**
	 * Get all data from given wink
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
}