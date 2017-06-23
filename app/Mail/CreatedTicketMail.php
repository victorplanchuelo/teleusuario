<?php

namespace App\Mail;

use App\Ticket;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class CreatedTicketMail extends Mailable
{
	use Queueable, SerializesModels;

	public $user_code;
	public $ticket;


	/**
	 * CreatedTicketMail constructor.
	 * @param $user_code
	 * @param Ticket $ticket
	 */
	public function __construct($user_code, Ticket $ticket)
	{
		$this->ticket=$ticket;
		$this->user_code=$user_code;
	}

	/**
	 * Build the message.
	 *
	 * @return $this
	 */
	public function build()
	{
		return $this->subject(trans('email.create_ticket.title'))
			->markdown('emails.tickets.create_ticket');
	}
}
