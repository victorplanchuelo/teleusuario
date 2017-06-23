<?php

namespace App\Http\Controllers;

use App\Mail\UpdateTicketMail;
use Carbon\Carbon;
use Illuminate\Http\Request;
 use App\User;
 use App\Ticket;
 use App\TicketComment;
 use Illuminate\Support\Facades\Auth;

class TicketCommentsController extends Controller
{
	public function postComment(Request $request)
	{
		$this->validate($request, [
			'comment'   => 'required'
		]);

		$ticket_id = $request->input('ticket_id');

		$comment = TicketComment::create([
			'ticket_id' => $ticket_id,
			'user_id'   => Auth::user()->id,
			'comment'   => $request->input('comment'),
		]);

		//Actualizamos la fecha de actualización del ticket
		$comment->ticket->updated_at = Carbon::now();
		$comment->ticket->save();

		// send mail if the user commenting is not the ticket owner
		if ($comment->ticket->user->id !== Auth::user()->id) {
			Mail::to($comment->ticket->user)
				->send(new UpdateTicketMail($comment->ticket));
		}

		return redirect()->back()->with("status", "Your comment has be submitted.");
	}
}
