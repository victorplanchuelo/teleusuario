<?php

namespace App\Http\ViewComposers;

use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class ActiveServicesComposer
{
	public $activeServices;
	/**
	 * Create a services composer
	 */
	public function __construct()
	{
		//Recuperamos los Servicios activos del usuario que tiene la session activa
		$this->activeServices = Auth::user()->services()->where('active', true)->get(['name', 'path']);;
	}

	/**
	 * Bind data to the view.
	 *
	 * @param  View  $view
	 * @return void
	 */
	public function getActiveServices(View $view)
	{
		$view->with('services', end($this->activeServices));
	}
}
