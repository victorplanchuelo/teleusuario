<div class="container">
	@if (count($errors) > 0)
		<div class="alert alert-danger">
			<ul class="list-unstyled">
				@foreach ($errors->all() as $error)
					<li class="text-center">{{ $error }}</li>
				@endforeach
			</ul>
		</div>
	@endif
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<form class="form-horizontal" role="form" method="POST" action="{{ route('password.request') }}">
					{{ csrf_field() }}
					<input type="hidden" name="token" value="{{ $token }}">
					<div id="box" class="animated bounceIn">
						<div id="top_header">
							<img src="{{asset('img/logo.png')}}" alt="Teleusuario Logo" />
							<h5>{{ trans('passwords.title_form') }}</h5>
						</div>
						<div id="inputs">
							<div class="form-block {{ $errors->has('email') ? ' has-error has-feedback' : '' }}">
								<input type="email" class="form-control" id="email" name="email" title="{{trans('passwords.email')}}" placeholder="{{trans('passwords.email')}}" value="{{$email or old('email')}}" required autofocus>
								<i class="icon-at"></i>
								@if ($errors->has('email'))
									<span class="help-block no-margin">
										<strong>{{ $errors->first('email') }}</strong>
									</span>
								@endif
							</div>
							<div class="form-block {{ $errors->has('password') ? ' has-error has-feedback' : '' }}">
								<input type="password" class="form-control" id="password" name="password" title="{{trans('passwords.password_lbl')}}" placeholder="{{trans('passwords.password_lbl')}}" value="">
								<i class="icon-spell-check"></i>
								@if ($errors->has('password'))
									<span class="help-block no-margin">
										<strong>{{ $errors->first('password') }}</strong>
									</span>
								@endif
							</div>
							<div class="form-block {{ $errors->has('password_confirmation') ? ' has-error has-feedback' : '' }}">
								<input type="password" class="form-control" id="password_confirmation" name="password_confirmation" title="{{trans('passwords.password_confirmation')}}" placeholder="{{trans('passwords.password_confirmation')}}" value="">
								<i class="icon-spell-check"></i>
								@if ($errors->has('password_confirmation'))
									<span class="help-block no-margin">
										<strong>{{ $errors->first('password_confirmation') }}</strong>
									</span>
								@endif
							</div>
							<div class="form-block">
								<input type="submit" class="btn btn-primary" value="{{ trans('passwords.submit') }}">
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>