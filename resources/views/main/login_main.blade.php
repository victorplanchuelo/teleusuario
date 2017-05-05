<div class="container">
	@if (session('success'))
		<div class="alert alert-success text-center">
			{{ session('success') }}
		</div>
	@endif
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
				<form action="#" method="post" id="login">
					<div id="box" class="animated bounceIn">
						<div id="top_header">
							<img src="{{ asset('img/logo.png')}}" alt="Teleusuario Logo" />
							<h5>
								{{ trans('validation.title_form') }}
							</h5>
						</div>
						{{ csrf_field() }}
						<div id="inputs">
							<div class="form-block {{ $errors->has('code') ? ' has-error has-feedback' : '' }}">
								<input type="text" placeholder="{{trans('validation.code_user')}}" id="code" name="code">
								<i class="icon-user-check"></i>
								@if ($errors->has('code'))
									<span class="help-block no-margin">
                                    <strong>{{ $errors->first('code') }}</strong>
                                </span>
								@endif
							</div>
							<div class="form-block {{ $errors->has('password') ? ' has-error has-feedback' : '' }}">
								<input type="password" placeholder="{{trans('validation.password_login')}}" id="password" name="password">
								<i class="icon-spell-check"></i>
								@if ($errors->has('password'))
									<span class="help-block no-margin">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
								@endif
							</div>
							<input type="submit" value="{{trans('validation.login')}}">
						</div>
						<div id="button" class="clearfix">
							<div class="reg_mini">
								<h5>{{ trans('validation.register_label') }} <a href="{{ url('/register')}}"> {{ trans('validation.register_a') }}</a></h5>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	<!--<div class="row">
		<div class="col-md-8 col-md-offset-2">
			 <a class="btn btn-warning" href="{{ url('/insert_fake_user')}}"> Insertar Usuario en tabla User</a>
		</div>
	</div>-->
</div>