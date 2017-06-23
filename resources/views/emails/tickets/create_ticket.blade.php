@component('mail::message')
# {{trans('email.create_ticket.title')}}
{{ trans('email.create_ticket.body1') }}<br/>
## {{"Ticket #".$ticket->ticket_id }}
@component('mail::panel')
<strong>{{ trans('email.create_ticket.data.user') }}</strong>:  {{ $user_code }}<br/>
<strong>{{ trans('email.create_ticket.data.urgent') }}</strong>:  {{ ($ticket->urgent) ? trans('email.create_ticket.data.yes') : trans('email.create_ticket.data.no') }}<br/>
<strong>{{ trans('email.create_ticket.data.title') }}</strong>:  {{ $ticket->title }}<br/>
<strong>{{ trans('email.create_ticket.data.motive') }}</strong>:  {{ $ticket->motive->category->name }} - {{ $ticket->motive->name }}<br/>
<strong>{{ trans('email.create_ticket.data.message') }}</strong>:<br/>
{!! nl2br(e($ticket->message)) !!}
@endcomponent
@endcomponent