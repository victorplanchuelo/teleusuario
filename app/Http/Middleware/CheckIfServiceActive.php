<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\Service as Service;
use Illuminate\Support\Facades\Log;

class CheckIfServiceActive
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
    	//Aqui debemos comprobar si el usuario tiene el servicio activo
	    Log::info(Service::where('path', $request->path())->count());
	    if(Service::where('path', $request->path())->count()>0)
	    {
		    $id_service = Service::where('path', $request->path())->first()->id;
		    $user_service = Auth::user()->services()->where('id', $id_service)->first();

		    if(count($user_service)>0 && $user_service->pivot->active===1)
			    return $next($request);

		    //QUEDARIA POR VER COMO HACER ESTO (LLAMAMOS A BACK CON UN ERROR O LLAMAMOS A UNA VISTA DE ERROR)
		    // return response('Unauthorized.', 401);
		    return redirect()->back()->withErrors(['error' => 'No tienes activado este servicio']);
	    }
	    else
		    return $next($request);

    }
}
