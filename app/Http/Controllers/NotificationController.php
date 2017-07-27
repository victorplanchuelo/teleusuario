<?php

namespace App\Http\Controllers;

use App\Helpers\NotificationMessage;
use App\Notifications\NewNotificationMessage;
use Illuminate\Support\Facades\Notification;
use Validator;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notifications = Auth::user()->notifications();
        return view('dashboard.notifications.notifications', compact('notifications'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    	$users = User::where('active',true)
	                ->orderBy('code','asc')
	                ->get(['id','code','name']);

        return view('dashboard.notifications.new',compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

	    $messages = [
		    'type.required' => trans('validation.custom.notifications.type.required'),
		    'user.required' => trans('validation.custom.notifications.user.required'),
		    'message.required' => trans('validation.custom.notifications.message.require'),
		    'message.min' => trans('validation.custom.notifications.message.min'),
	    ];

	    $validator = Validator::make($request->all(), [
		    'type' => 'required',
		    'user' => 'required|array|min:1',
		    'message' => 'required|min:10',
	    ], $messages);

	    if ($validator->fails()) {
		    return response()->json([
		    	'success' => 0,
			    'error' => $validator->errors()->all(),
		    ]);
	    }

	    if(in_array("0", $request->user) && count($request->user)>1)
	    {
		    return response()->json([
			    'success' => 0,
			    'error' => trans('validation.custom.notifications.user.choose'),
		    ]);
	    }

	    // SI PASAN LAS VALIDACIONES SE CREA LA NOTIFICACIÓN SEGÚN LO INSERTADO
	    if(in_array("0", $request->user))
		    $users = User::where('active',true)->get();
	    else
			$users = User::whereIn('code',$request->user)->get();

	    $notification = new NotificationMessage($request->message, $request->type);

	    Notification::send($users, new NewNotificationMessage($notification));

	    return response()->json([
	    	'success' => 1,
		    'message' => trans('dashboard.notifications.new.success')
	    ]);

    }


    public function markAsRead(Request $request)
    {
    	$strErr = "";
    	$success = 0;
    	$html='';

    	$notification = Auth::user()->notifications()->where('id',$request->notification)->first();
	    if ($notification)
	    {
	    	$leido_anteriormente = 1;

	    	if($notification->where('read_at')===null)
		    {
			    $notification->markAsRead();
			    $html = view('main.inc.notifications')->render();
			    $leido_anteriormente=0;
		    }

		    $success=1;

		    return response()->json([
		    	'success' => $success,
			    'html' => $html,
			    'error' => [$strErr],
			    'notification_deleted' => $notification->id,
			    'ya_leido' => $leido_anteriormente,
		    ]);
	    }
	    else
		    return response()->json([
		    	'success' => $success,
			    'html' => $html,
			    'error' => [$strErr],
		    ]);
    }

}
