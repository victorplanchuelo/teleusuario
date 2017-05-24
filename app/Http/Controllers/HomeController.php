<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Services;

class HomeController extends Controller
{
	protected $services;


    /**
     * Create a new controller instance.
     * @var Services
     * @return void
     */
	public function __construct(Services $services)
	{
		$this->services = $services;
		$this->middleware('auth');
	}

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


		$this->services = $this->services->getMessages(4);

		dd(json_decode($this->services->getBody()->getContents()));

        return view('dashboard.home');
    }
}
