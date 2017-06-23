<!-- Row ends -->
<div class="row gutter">
	<div class="col-md-10 col-md-offset-1">
		<div class="panel panel-default">
			<div class="panel-body">
				@include('main.tickets.inc.flash')

				<form class="form-horizontal" role="form" method="POST" action="{{ route('create_ticket') }}">
					{!! csrf_field() !!}

					<div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
						<label for="title" class="col-md-4 control-label">{{ trans('dashboard.tickets.create_ticket.form.name') }}</label>

						<div class="col-md-6">
							<input id="title" type="text" class="form-control" name="title" value="{{ old('title') }}">

							@if ($errors->has('title'))
								<span class="help-block">
                                    <strong>{{ $errors->first('title') }}</strong>
                                </span>
							@endif
						</div>
					</div>

					<div class="form-group{{ $errors->has('category') ? ' has-error' : '' }}">
						<label for="category" class="col-md-4 control-label">{{ trans('dashboard.tickets.create_ticket.form.category') }}</label>

						<div class="col-md-6">
							<select id="category" class="form-control" name="category">
								<option value="">{{ trans('dashboard.tickets.create_ticket.form.select_category') }}</option>
								@foreach ($categories as $index => $category)
									<option value="{{ $index }}">{{ $category }}</option>
								@endforeach
							</select>

							@if ($errors->has('category'))
								<span class="help-block">
                                    <strong>{{ $errors->first('category') }}</strong>
                                </span>
							@endif
						</div>
					</div>
					<div class="form-group{{ $errors->has('motive') ? ' has-error' : '' }}">
						<label for="motive" class="col-md-4 control-label">{{ trans('dashboard.tickets.create_ticket.form.motive') }}</label>

						<div class="col-md-6">
							<select id="motive" class="form-control" name="motive">
								<option value="">{{ trans('dashboard.tickets.create_ticket.form.select_motive') }}</option>
								@if(isset($motives))
									@foreach ($motives as $motive)
										<option value="{{ $motive->id }}">{{ $motive->name }}</option>
									@endforeach
								@endif
							</select>

							@if ($errors->has('motive'))
								<span class="help-block">
                                    <strong>{{ $errors->first('motive') }}</strong>
                                </span>
							@endif
						</div>
					</div>

					<div class="form-group{{ $errors->has('message') ? ' has-error' : '' }}">
						<label for="message" class="col-md-4 control-label">{{ trans('dashboard.tickets.create_ticket.form.message') }}</label>

						<div class="col-md-6">
							<textarea rows="10" id="message" class="form-control new-message" name="message"></textarea>

							@if ($errors->has('message'))
								<span class="help-block">
                                    <strong>{{ $errors->first('message') }}</strong>
                                </span>
							@endif
						</div>
					</div>

					<div class="form-group">
						<div class="col-md-6 col-md-offset-4">
							<button type="submit" class="btn btn-info">
								{{ trans('dashboard.tickets.create_ticket.form.open_ticket') }}
							</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>