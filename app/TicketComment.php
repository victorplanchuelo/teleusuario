<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TicketComment extends Model
{
    protected $fillable = ['user_id', 'ticket_id','comment'];

    protected $dates = ['created_at', 'updated_at'];
    protected $dateFormat = 'Y-m-d H:i:s';

    public function ticket()
    {
    	return $this->belongsTo(Ticket::class);
    }

    public function user()
    {
    	return $this->belongsTo(User::class);
    }
}
