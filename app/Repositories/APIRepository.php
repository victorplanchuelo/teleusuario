<?php

namespace App\Repositories;


use GuzzleHttp\Client;

class APIRepository
{
	protected $client;

	public function __construct(Client $client)
	{
		$this->client = $client;
	}

	public function get($url, $data)
	{
		$arrData = ['operacion' => $url];

		foreach ($data as $key=>$value)
		{
			$arrData = array_add($arrData,$key,$value);
		}

		//Se hace la llamada por GET
		return $this->client->request(
			'GET',
			'servicio.php',
			[
				'query' => $arrData,
			]
		);
	}

	public function post($url, $data)
	{
		//Se hace la llamada por POST
		return $this->client->request(
			'GET',
			'servicio.php',
			[
				'query' => ['operacion' => $url],
				'form_params' => [
					$data,
				],
			]
		);
	}
}