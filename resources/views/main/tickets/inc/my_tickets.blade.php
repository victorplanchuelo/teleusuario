<!-- Row ends -->
<div class="row gutter">
	<div class="col-md-10 col-md-offset-1">
		<div class="panel panel-default">
			<div class="panel-body">
				@if ($tickets->isEmpty())
					<p>{{ trans('dashboard.tickets.list_tickets.data.empty') }}</p>
				@else
					<table class="table table-hover">
						<thead>
						<tr>
							<th>{{ trans('dashboard.tickets.list_tickets.data.motive') }}</th>
							<th>{{ trans('dashboard.tickets.list_tickets.data.title') }}</th>
							<th>{{ trans('dashboard.tickets.list_tickets.data.status') }}</th>
							<th>{{ trans('dashboard.tickets.list_tickets.data.last_updated') }}</th>
						</tr>
						</thead>
						<tbody>
						@foreach ($tickets->items() as $ticket)
							<tr>
								<td>
									@foreach ($motives as $id => $motive)
										@if ($id === $ticket->motive_id)
											{{ $motive }}
										@endif
									@endforeach
								</td>
								<td>
									<a class="text-info" href="{{ url('dashboard/tickets/'. $ticket->ticket_id) }}">
										#{{ $ticket->ticket_id }} - {{ $ticket->title }}
									</a>
								</td>
								<td>
									@if ($ticket->status === 0)
										<span class="label label-success">{{ trans('dashboard.tickets.list_tickets.data.open') }}</span>
									@else
										<span class="label label-danger">{{ trans('dashboard.tickets.list_tickets.data.close') }}</span>
									@endif
								</td>
								<td>{{ $ticket->updated_at->format('d/m/Y H:i') }}</td>
							</tr>
						@endforeach
						</tbody>
					</table>

					{{ $tickets->render() }}
				@endif
			</div>
		</div>
	</div>
</div>