<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				@if (session('status'))
					<div class="alert alert-success">
						{{ session('status') }}
					</div>
				@endif
				<form class="form-horizontal" id="wrapper" role="form" method="POST" action="{{ route('password.email') }}">
					{{ csrf_field() }}
					<div id="box" class="animated bounceIn">
						<div id="top_header">
							<img src="{{ asset('img/logo.png') }}" class="logo" alt="Teleusuario">
							<h5>
								{{ trans('passwords.sent_email_form') }}
							</h5>
						</div>
						<h5>{{ trans('passwords.sent_email_title') }}</h5>
						<div id="inputs">
							<div class="form-block{{ $errors->has('email') ? ' has-error' : '' }}">
								<input id="email" name="email" type="email" placeholder="{{trans('validation.email_ph')}}" value="{{ old('email') }}" required>
								<i class="icon-user-check"></i>
							</div>
							@if ($errors->has('email'))
								<span class="help-block">
									<strong>{{ $errors->first('email') }}</strong>
								</span>
							@endif
							<input type="submit" value="{{ trans('passwords.sent_email_submit') }}">
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>