<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoryMotive extends Model
{
	protected $fillable = ['name', 'category_id'];

	// Para no tener problemas indicamos el nombre de la tabla
	protected $table = 'category_motives';

	public function ticket()
	{
		return $this->hasMany(Ticket::class);
	}

	public function category()
	{
		return $this->belongsTo(TicketCategory::class, 'category_id');
	}
}
