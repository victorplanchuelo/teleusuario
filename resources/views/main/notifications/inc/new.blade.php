<!-- Row ends -->
<div class="row gutter">
	<div class="col-md-10 col-md-offset-1">
		<div class="panel panel-default">
			<div class="panel-body">
				@include('main.notifications.inc.flash')

				<form class="form-horizontal" role="form"">
					{!! csrf_field() !!}

					<div class="form-group{{ $errors->has('type') ? ' has-error' : '' }}">
						<label for="type" class="col-lg-3 col-md-4 control-label">{{ trans('dashboard.notifications.new.form.type') }}</label>

						<div class="col-md-6">
							<select id="type" class="form-control" name="type">
								<option value="">{{ trans('dashboard.notifications.new.form.types.select') }}</option>
								<option {{ (old('type')==="1") ? "selected='selected'" : "" }} value="1">{{ trans('dashboard.notifications.new.form.types.danger') }}</option>
								<option {{ (old('type')==="2") ? "selected='selected'" : "" }} value="2">{{ trans('dashboard.notifications.new.form.types.warning') }}</option>
								<option {{ (old('type')==="3") ? "selected='selected'" : "" }} value="3">{{ trans('dashboard.notifications.new.form.types.info') }}</option>
								<option {{ (old('type')==="4") ? "selected='selected'" : "" }} value="4">{{ trans('dashboard.notifications.new.form.types.congrat') }}</option>
							</select>

							@if ($errors->has('type'))
								<span class="help-block">
                                    <strong>{{ $errors->first('type') }}</strong>
                                </span>
							@endif
						</div>
					</div>

					<div class="form-group{{ $errors->has('user') ? ' has-error' : '' }}">
						<label for="user" class="col-lg-3 col-md-4 control-label">{{ trans('dashboard.notifications.new.form.user') }}</label>

						<div class="col-md-6">
							<select id="user" class="form-control" name="user[]" multiple="multiple">
								<option value="0">{{ trans('dashboard.notifications.new.form.users.all') }}</option>
								@foreach($users as $user)
									<option {{ (old('user')===$user->code) ? "selected='selected'" : "" }} data-id="{{$user->id}}" value="{{$user->code}}">{{ $user->code . ' - ' . $user->name }}</option>
								@endforeach
							</select>

							@if ($errors->has('user'))
								<span class="help-block">
                                    <strong>{{ $errors->first('user') }}</strong>
                                </span>
							@endif
						</div>
					</div>

					<div class="form-group{{ $errors->has('message') ? ' has-error' : '' }}">
						<label for="message" class="col-lg-3 col-md-4 control-label">{{ trans('dashboard.notifications.new.form.message') }}</label>

						<div class="col-md-6">
							<textarea rows="10" id="message" class="form-control new-message" name="message">{{ nl2br(e(old('message'))) }}</textarea>

							@if ($errors->has('message'))
								<span class="help-block">
                                    <strong>{{ $errors->first('message') }}</strong>
                                </span>
							@endif
						</div>
					</div>

					<div class="form-group">
						<div class="col-lg-2 col-lg-offset-5 col-md-3 col-md-offset-5 col-xs-12">
							<button id="create-notification" type="button" class="btn btn-info">
								{{ trans('dashboard.notifications.new.form.new') }}
							</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>