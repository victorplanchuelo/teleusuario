<?php

namespace App\Repositories;

use Illuminate\Support\Facades\Auth;

class Services extends APIRepository
{
	public function getMessages($num) {

		//Aqui devolveremos la vista del home del dashboard
		//con las llamadas a API necesarias
		return $this->get('bandeja_entrada_obtener_conversaciones_premium_aleatorio',
			[
				'animadora' => Auth::user()->code,
				'num_mensajes' => $num,
			]
		);

	}
}