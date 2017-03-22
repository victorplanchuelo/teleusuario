@extends('layouts.auth')

@section('content')
	<div class="container">
		@if (count($errors) > 0)
			<div class="alert alert-danger">
				<ul>
					@foreach ($errors->all() as $error)
						<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
		@endif
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<div class="panel panel-default">
					<form action="#" method="post" id="register">
						<div id="box" class="animated bounceIn">
							<div id="top_header">
								<img src="{{asset('img/logo.png')}}" alt="Teleusuario Logo" />
								<h5>{{ trans('validation.title_form') }}</h5>
							</div>
							{{ csrf_field() }}
							<div id="inputs">
								<div class="form-block {{ $errors->has('name') ? ' has-error has-feedback' : '' }}">
									<input type="text" class="form-control" id="name" name="name" title="{{trans('validation.full_name')}}" placeholder="{{trans('validation.full_name')}}" value="{{old('name')}}" required autofocus>
									<i class="icon-profile"></i>
									@if ($errors->has('name'))
										<span class="help-block no-margin">
											<strong>{{ $errors->first('name') }}</strong>
										</span>
									@endif
								</div>
								<div class="form-block {{ $errors->has('email') ? ' has-error has-feedback' : '' }}">
									<input type="email" class="form-control" id="email" name="email" title="{{trans('validation.email_ph')}}" placeholder="{{trans('validation.email_ph')}}" value="{{old('email')}}" required>
									<i class="icon-at"></i>
									@if ($errors->has('email'))
										<span class="help-block no-margin">
											<strong>{{ $errors->first('email') }}</strong>
										</span>
									@endif
								</div>
								<div class="form-block {{ $errors->has('phone') ? ' has-error has-feedback' : 'no-tiene' }}">
									<input type="text" class="form-control" id="phone" name="phone" title="{{trans('validation.phone')}}" placeholder="{{trans('validation.phone')}}" value="{{old('phone')}}">
									<i class="icon-phone"></i>
									@if ($errors->has('phone'))
										<span class="help-block no-margin">
											<strong>{{ $errors->first('phone') }}</strong>
										</span>
									@endif
								</div>
								<div class="form-block {{ $errors->has('genre') ? ' has-error has-feedback' : '' }}">
									<div class="form-group form-genre">
										<label class="radio-inline">
											<input type="radio" name="genre" id="male" value="1" @if(old('genre')=="1") checked @endif> {{trans('validation.male')}}
										</label>
										<label class="radio-inline pull-right">
											<input type="radio" name="genre" id="female" value="2" @if(old('genre')=="2") checked @endif> {{trans('validation.female')}}
										</label>
									</div>
									@if ($errors->has('genre'))
										<span class="help-block no-margin">
											<strong>{{ $errors->first('genre') }}</strong>
										</span>
									@endif
								</div>
								<div class="form-block {{ $errors->has('birthdate') ? ' has-error has-feedback' : '' }}">
									<?php
									$now = \Carbon\Carbon::now();
									$now = $now->format('Y-m-d');

									$date = \Carbon\Carbon::now();
									$date->year = $date->year - 100;
									$date = $date->format('Y-m-d');
									?>
									<input title="{{trans('validation.birthdate')}}" min="{{$date}}" max="{{$now}}" placeholder="{{trans('validation.birthdate')}}" class="textbox-n form-control" type="date" name="birthdate"  id="birthdate" value="{{old('birthdate')}}">
									<i class="icon-calendar7"></i>
									@if ($errors->has('birthdate'))
										<span class="help-block no-margin">
											<strong>{{ $errors->first('birthdate') }}</strong>
										</span>
									@endif
								</div>
								<div class="form-block {{ $errors->has('password') ? ' has-error has-feedback' : '' }}">
									<input type="password" class="form-control" id="password" name="password" title="{{trans('validation.password')}}" placeholder="{{trans('validation.password')}}" value="">
									<i class="icon-spell-check"></i>
									@if ($errors->has('password'))
										<span class="help-block no-margin">
											<strong>{{ $errors->first('password') }}</strong>
										</span>
									@endif
								</div>
								<div class="form-block {{ $errors->has('password_confirmation') ? ' has-error has-feedback' : '' }}">
									<input type="password" class="form-control" id="password_confirmation" name="password_confirmation" title="{{trans('validation.password_confirmation')}}" placeholder="{{trans('validation.password_confirmation')}}" value="">
									<i class="icon-spell-check"></i>
									@if ($errors->has('password_confirmation'))
										<span class="help-block no-margin">
											<strong>{{ $errors->first('password_confirmation') }}</strong>
										</span>
									@endif
								</div>
								<div class="form-block chk_terms">
									<div class="checkbox">
										<input type="checkbox" id="terms">
										<a class="terms" href="{{ url('/terms') }}">{{ trans('validation.accept_terms') }}</a>
									</div>
								</div>
								<input type="button" class="register" value="{{ trans('validation.sign_up') }}">
							</div>
							<div class="log_mini">
								<h5>{{ trans('validation.login_label') }} <a href="{{ url('/')}}"> {{ trans('validation.login_a') }}</a></h5>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
@endsection


@section('scripts')
	<script type="text/javascript">
		var datefield=document.createElement("input")
		datefield.setAttribute("type", "date")
	</script>

	<script>
		if (datefield.type!="date"){ //if browser doesn't support input type="date", initialize date picker widget:
			jQuery(function($){ //on document.ready

				$.datepicker.regional['es'] = {
					closeText: 'Cerrar',
					prevText: '< Ant',
					nextText: 'Sig >',
					currentText: 'Hoy',
					monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
					monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
					dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
					dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
					dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá'],
					weekHeader: 'Sm',
					dateFormat: 'dd/mm/yy',
					firstDay: 1,
					isRTL: false,
					showMonthAfterYear: false,
					yearSuffix: '',

					setDate: new Date(),
					minDate: '-100Y',
					maxDate: new Date()
				};
				$.datepicker.setDefaults($.datepicker.regional['es']);


				$('#birthdate').datepicker();
			})
		}
	</script>

	<script type="text/javascript">
		$( document ).ready(function() {

			$('#birthdate').focus(function() {
				$(this).attr('placeholder', '');
			});

			$('.register').click(function() {
				if ($('#terms').is(':checked')) {
					$('#register').submit();
				} else {
					$('<div class="alert alert-danger"><ul><li>{{ trans('validation.terms') }}</li></ul></div>').insertBefore('#register');
					return false;
				}
			});
		});
	</script>
@endsection