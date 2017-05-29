<?php

namespace App\Repositories;

use Illuminate\Support\Facades\Auth;

class Services extends APIRepository
{
	public function getIdsMessages($num, $fecha) {

		//Aqui devolveremos la vista del home del dashboard
		//con las llamadas a API necesarias
		return $this->get('bandeja_entrada_obtener_conversaciones_premium_aleatorio',
			[
				'animadora' => Auth::user()->code,
				'num_mensajes' => $num,
				'fecha' => $fecha,
			]
		);

	}

	public function getRandomMessage($arrMsg)
	{
		//De un array de mensajes dado, escogemos uno aleatoriamente
		$rand_keys = array_rand($arrMsg, 1);
		return $arrMsg[$rand_keys];
	}



	public function getDataMessage($conversation_id)
	{
		return $this->post('bandeja_entrada_leer_conversacion_premium',
			[
				'conversacion' => $conversation_id,
			]
		);
	}
}