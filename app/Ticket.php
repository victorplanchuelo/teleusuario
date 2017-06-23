<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Ticket extends Model
{
    protected $fillable = ['user_id', 'motive_id', 'ticket_id', 'title', 'message', 'status', 'urgent'];

    protected $table = "tickets";

	protected $dates = ['updated_at', 'created_at'];
	protected $dateFormat = 'Y-m-d H:i:s';

	public function motive()
	{
		return $this->belongsTo(CategoryMotive::class, 'motive_id');
	}

	public function user()
	{
		return $this->belongsTo(User::class, 'user_id');
	}

	public function comments()
	{
		return $this->hasMany(TicketComment::class);
	}


	/**
	 * @param $query
	 * @param $data
	 * @return Ticket
	 */
	public function scopeCreateTicket($query, $data)
	{
		$urgent = 0;

		if(array_has([1,2,3,7], $data['motive']))
			$urgent=1;

		return $query->create([
			'title'     => $data['title'],
			'user_id'   => (int)Auth::user()->id,
			'ticket_id' => strtoupper(str_random(10)),
			'motive_id'  => $data['motive'],
			'message'   => $data['message'],
			'status'    => 0,
			'urgent'    => $urgent, //0 - Poco urgente, 1 - Urgente
		]);
	}
}
