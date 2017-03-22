<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

	/**
	 * Con esta propiedad no tiene en cuenta los campos created_at y updated_at.
	 * que se "suelen crear" normalmente en las migraciones de Laravel.
	 *
	 * @var boolean
	 */
	public $timestamps = false;

	// Para no tener problemas indicamos el nombre de la tabla
	protected $table = 'users';



    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'code', 'name', 'contact_phone', 'connection_phone', 'birthdate',
	    'email', 'password', 'real_password', 'start_date', 'end_date', 'genre',
	    'application_id', 'active', 'alias', 'country', 'province', 'city', 'address',
	    'cp', 'nif', 'rec_conversations', 'company_id', 'bank_id', 'iban', 'leave_reason',
	    'contract_state_id','contract_date', 'responsible'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'real_password',
    ];


    public function application()
    {
    	return $this->hasOne('App\UserApplication');
    }

	public function services()
	{
		return $this->belongsToMany('App\Service');
	}

	public function connections()
	{
		return $this->hasMany('App\Connection');
	}

	public function schedules()
	{
		return $this->hasMany('App\Schedule');
	}

	public function company()
	{
		return $this->belongsTo('App\Company');
	}

	public function bank()
	{
		return $this->belongsTo('App\Bank');
	}

	public function contract_state()
	{
		$this->belongsTo('App\ContractState');
	}

	public function invoices()
	{
		return $this->hasMany('App\Invoice');
	}

	public function delivery_notes()
	{
		return $this->hasMany('App\DeliveryNote');
	}
}