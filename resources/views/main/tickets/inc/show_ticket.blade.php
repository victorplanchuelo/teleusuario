<!-- Row ends -->
<div class="row gutter">
	<div class="col-md-10 col-md-offset-1">
		<div class="panel">
			<div class="panel-heading">
				<h4 class="panel-title">#{{ $ticket->ticket_id }} - {{ $ticket->title }}</h4>
			</div>

			<div class="panel-body">
				@include('main.tickets.inc.flash')

				<div class="ticket-info">
					<p><strong>{{ trans('dashboard.tickets.show_ticket.data.cat&mot') }}:</strong> {{ $category }} - {{ $motive }}</p>
					<p>
						<strong>{{ trans('dashboard.tickets.show_ticket.data.status') }}</strong>
						<span class="label @if($ticket->status === 0) label-success @else label-danger @endif">
							@if($ticket->status === 0)
								{{ trans('dashboard.tickets.show_ticket.data.open') }}
							@else
								{{ trans('dashboard.tickets.show_ticket.data.close') }}
							@endif
						</span>
						@if($ticket->status === 0)
							<a class="btn btn-danger btn-xs" href="{{url('/dashboard/tickets/') . "/" . $ticket->ticket_id . "/close"}}"> CERRAR Ticket</a>
						@else
							<a class="btn btn-warning btn-xs" href="{{url('/dashboard/tickets/') . "/" . $ticket->ticket_id . "/reopen"}}"> REABRIR Ticket</a>
						@endif
					</p>
					<p><strong>{{ trans('dashboard.tickets.show_ticket.data.created_at') }}:</strong> {{ $ticket->created_at->format('d/m/Y H:i') }}</p>
					<p><strong>{{ trans('dashboard.tickets.show_ticket.data.last_update') }}:</strong> {{ $ticket->updated_at->format('d/m/Y H:i') }}</p>
					<p><strong>{{ trans('dashboard.tickets.show_ticket.data.message') }}:</strong></p>
					<div class="row gutter">
						<div class="col-md-4 grey">
							<p><i class="ticket-message icon-speech-bubble icon-5x text-info pull-left"></i>{!! nl2br(e($ticket->message)) !!}</p>
						</div>
					</div>
					<br/>
				</div>

				<hr>

				<div class="comment-form">
					<form action="{{ route('create_ticket_comment') }}" method="POST" class="form">
						{!! csrf_field() !!}

						<input type="hidden" name="ticket_id" value="{{ $ticket->id }}">

						<div class="form-group{{ $errors->has('comment') ? ' has-error' : '' }}">
							<textarea rows="10" id="comment" class="form-control new-message" name="comment"></textarea>

							@if ($errors->has('comment'))
								<span class="help-block">
                                        <strong>{{ $errors->first('comment') }}</strong>
                                    </span>
							@endif
						</div>

						<div class="form-group">
							<button type="submit" class="btn btn-info">{{ trans('dashboard.tickets.show_ticket.data.submit') }}</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="row gutter">
	<div class="col-md-10 col-md-offset-1">
		<div class="panel">
			<div class="panel-title">
				<h3>Comentarios</h3>
			</div>
			<div class="panel-body">
				<div class="col-md-8 col-md-push-2">
					@foreach($comments as $comment)
						<div class="bs-example" data-example-id="default-media" style="margin-bottom: 10px;">
							<div class="media">
								<div class="media-left">
									<a href="#">
										<img alt="64x64" class="media-object" data-src="holder.js/64x64" src="@if(is_null($comment->user->thumb_path)) {{ asset('img/thumbs/user.png') }} @else {{ asset('storage/'.$comment->user->thumb_path) }}@endif" data-holder-rendered="true" style="width: 64px; height: 64px;">
									</a>
								</div>
								<div class="media-body">
									<span class="pull-right comment-date small">{{ $comment->created_at->format('d/m/Y H:i') }}</span>
									<h4 class="media-heading">{{ $comment->user->name }}</h4>
									{{ nl2br(e($comment->comment)) }}
								</div>
							</div>
						</div>
					@endforeach
				</div>
			</div>
		</div>
	</div>
</div>