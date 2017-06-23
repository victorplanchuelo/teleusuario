<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TicketCategory extends Model
{
	protected $fillable = ['name'];

	public function motives()
	{
		return $this->hasMany(CategoryMotive::class);
	}
}
