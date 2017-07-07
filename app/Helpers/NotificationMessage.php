<?php

namespace App\Helpers;


use Carbon\Carbon;

class NotificationMessage
{
	public $message;
	public $type;
	public $created_at;

	/**
	 * NotificationMessage constructor.
	 * @param $message
	 * @param $type
	 */
	public function __construct($message, $type)
	{
		$this->message = $message;
		$this->type = $type;
		$this->created_at = Carbon::now()->format('d/m/Y h:i');
	}


}