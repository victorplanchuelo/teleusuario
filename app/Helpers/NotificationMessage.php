<?php

namespace App\Helpers;

class NotificationMessage
{
	public $message;
	public $type;

	/**
	 * NotificationMessage constructor.
	 * @param $message
	 * @param $type
	 */
	public function __construct($message, $type)
	{
		$this->message = $message;
		$this->type = $type;
	}

}