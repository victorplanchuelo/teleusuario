<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Services;

class HomeController extends Controller
{
	protected $services;
	protected $data;
	protected $idsMessages;


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
		$success=1;
		$strErr='';
		$message=[];
		return view('dashboard.home', compact('success','message','strErr'));
	}

    /**
     * Show the application dashboard.
     *
     */
    public function getMessage()
    {
	    if(!session()->get('ids_conversaciones'))
	    {
		    $this->idsMessages = json_decode($this->services->getIdsMessages(10, 20170401)->getBody()->getContents());

		    if($this->idsMessages->success !=1)
		    {
			    return 0;
		    }

		    //Aqui hemos obtenido los ids de las conversaciones
		    //Máximo num. de conversaciones - El número pasado por parámetro

		    //Guardamos en sesión/cache
		    session()->put('ids_conversaciones', json_encode($this->idsMessages->conversations));
		    session()->save();
	    }

	    //Teniendo los ids de las conversaciones, recuperamos los datos
		if(!session()->get('conversacion_actual'))
		{
			session()->put('conversacion_actual', $this->services->getRandomMessage($this->idsMessages->conversations));
			session()->save();
		}

		$id = session()->get('conversacion_actual');

	    $this->data = json_decode($this->services->getDataMessage($id)->getBody()->getContents());
        return 1;
    }

    public function getTask(Request $request)
    {

    	//Llega aquí cuando la autónoma ha pulsado "iniciar/Continuar tareas"
	    // Primero, ya teniendo la tarea, debemos comprobar si hay datos guardados en la session
	    // para saber si tiene que hacer una cosa u otra

    	$task =  $request['task'];
    	$strErr = '';
		$success=0;

    	switch ($task)
	    {
		    case 'message':
		    	$success = $this->getMessage();
		    	break;
	    }



	    if(!$success)
		    $strErr = trans('dashboard.task.message.conversation.error');

    	$message = $this->data;

	    return view('main.inc.task.message', compact('success', 'message', 'strErr'));
    }
}
