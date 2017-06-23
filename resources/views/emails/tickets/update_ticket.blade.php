@component('mail::message')
# {{ trans('email.update_ticket.title') }}
{{ trans('email.update_ticket.body1') . '#' . $ticket->ticket_id . trans('email.update_ticket.body2') }}<br/>
@component('mail::panel')
## {{ trans('email.update_ticket.data.panel') }}
<strong>{{ trans('email.update_ticket.data.title') }}</strong>:  {{ $ticket->title }}<br/>
<strong>{{ trans('email.update_ticket.data.motive') }}</strong>:  {{ $ticket->motive->category->name }} - {{ $ticket->motive->name }}<br/>
@endcomponent
@component('mail::button', ['url' => url('/dashboard/tickets/'. $ticket->ticket_id)])
{{trans('email.update_ticket.button')}}
@endcomponent
@endcomponent
