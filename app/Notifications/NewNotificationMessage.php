<?php

namespace App\Notifications;

use App\Helpers\NotificationMessage;
use GuzzleHttp\Client;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class NewNotificationMessage extends Notification
{
    use Queueable;

    protected $message;

	/**
	 * Create a new notification instance.
	 *
	 * @param $message
	 */
    public function __construct(NotificationMessage $message)
    {
        $this->message = $message;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }


	/**
	 * @param $notifiable
	 * @return array
	 */
	public function toDatabase($notifiable)
	{
		//Antes de guardar en la BD de SQL Server lo metemos en Firebase vía Guzzle

		$url = 'https://teleusuario-1a83e.firebaseio.com/notifications/' . $notifiable->code . '/notifications/' . $this->id . '.json';
		$client = new Client();

		$notification = array(
			'id' => $this->id,
			'type' => $this->message->type,
			'message' => $this->message->message,
		);

		$response = $client->patch($url, [
			'json' => $notification
		]);

		return [
			'message' => $this->message->message,
			'type' => $this->message->type,
			'read' => 0,
		];
	}


    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
        ];
    }
}
