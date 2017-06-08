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
}