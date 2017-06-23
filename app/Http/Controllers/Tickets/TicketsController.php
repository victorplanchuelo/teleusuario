<?php

namespace App\Http\Controllers\Tickets;

use App\CategoryMotive;
use App\Http\Controllers\Controller;
use App\Mail\UpdateTicketMail;
use App\TicketCategory;
use App\Ticket;
use App\Mail\CreatedTicketMail;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Mail;

class TicketsController extends Controller
{
	/**
	 * Display a listing of tickets.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
    }

    /**
     * Show the form for creating a new Ticket.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
	    $categories = TicketCategory::orderBy('name')->pluck('name', 'id');
	    return view('dashboard.tickets.create_ticket', compact('categories'));
    }

    /**
     * Store a newly ticket in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
	    $this->validate($request, [
		    'title'     => 'required|min:4',
		    'category'  => 'required',
		    'motive'  => 'required',
		    'message'   => 'required|min:4'
	    ]);

	    $ticket = Ticket::createTicket($request->all());

	    //Una vez guardado, enviamos correo al responsable
	    //Se envia el mail
	    $user_email = $ticket->motive->category->email_responsible;

	    Mail::to($user_email)
		    ->send(new CreatedTicketMail(Auth::user()->code,$ticket));

	    return redirect()->back()->with("status", trans('dashboard.tickets.create_ticket.responses.ticket_with_id') . $ticket->ticket_id . trans('dashboard.tickets.create_ticket.responses.opened'));
    }

	/**
	 * Display the specified ticket.
	 *
	 * @param $ticket_id
	 * @return \Illuminate\Http\Response
	 * @internal param int $id
	 */
    public function show($ticket_id)
    {
	    $ticket = Ticket::where('ticket_id', $ticket_id)->firstOrFail();
	    $category = $ticket->motive->category->name;
	    $comments = $ticket->comments;
	    $motive=$ticket->motive->name;
	    return view('dashboard.tickets.show_ticket', compact('ticket', 'category', 'motive','comments'));
    }

	function getMotives()
	{
		$category = Input::get('category');
		$motives = CategoryMotive::where('category_id','=',$category)->pluck('id','name');
		return $motives;
	}

	public function userTickets()
	{
		$tickets = Ticket::where('user_id', Auth::user()->id)->orderBy('status', 'ASC')->orderBy('urgent', 'DESC')->orderBy('updated_at', 'DESC')->paginate(10);

		$motives = CategoryMotive::all()->pluck('name', 'id');

		return view('dashboard.tickets.my_tickets', compact('tickets', 'motives'));
	}

	public function openCloseTicket($ticket_id, $action)
	{
		$ticket = Ticket::where('ticket_id', $ticket_id)->firstOrFail();
		$ticket->status = ($action==='close') ? 1 : 0;
		$ticket->save();

		$ticketOwner = $ticket->user;

		//Mandamos mensaje a la persona que creó el ticket, para decirle que se ha cerrado el ticket
		Mail::to($ticketOwner)
			->send(new UpdateTicketMail($ticket));

		return redirect()->back()->with("status", ($action==='close') ? trans('dashboard.tickets.close_ticket.success') : trans('dashboard.tickets.reopen_ticket.success'));
	}
}
