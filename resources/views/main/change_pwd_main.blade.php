<!-- Dashboard Wrapper Start -->
<div class="dashboard-wrapper dashboard-wrapper-lg">

	<!-- Container fluid Starts -->
	<div class="container-fluid">
		@if (session('success'))
			<div class="alert alert-success text-center">
				{{ session('success') }}
			</div>
		@endif
			@if (session('error'))
				<div class="alert alert-danger text-center">
					{{ session('error') }}
				</div>
		@endif
		<!-- Top Bar Starts -->
		<div class="top-bar clearfix">
			<div class="row gutter">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<div class="page-title">
						<h3>{{ trans('dashboard.change_password.title') }}</h3>
					</div>
				</div>
			</div>
		</div>
		<div class="row gutter">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="panel">
					<div class="panel-heading text-center">
						<span class="label label-danger label-bdr"><strong>{{ trans('dashboard.change_password.message.label1') }}</strong> {{ trans('dashboard.change_password.message.label2') }}</span>
					</div>
					<div class="panel-body">
						<form class="form-horizontal" method="POST" action="{{ route('dashboard.change_pwd.edit') }}">
							{{ csrf_field() }}
							<div class="form-group row gutter {{ $errors->has('password') ? ' has-error has-feedback' : '' }}">
								<label class="col-lg-4 control-label">{{ trans('dashboard.change_password.password') }}</label>
								<div class="col-lg-4">
									<input required type="password" class="form-control" placeholder="{{ trans('dashboard.change_password.password') }}" name="password" data-bv-field="password"><i class="form-control-feedback" data-bv-icon-for="password" style="display: none;"></i>
									@if ($errors->has('password'))
										<small class="help-block">{{ $errors->first('password') }}</small>
									@endif
								</div>
							</div>
							<div class="form-group row gutter {{ $errors->has('password_confirmation') ? ' has-error has-feedback' : '' }}">
								<label class="col-lg-4 control-label">{{ trans('dashboard.change_password.password_confirm') }}</label>
								<div class="col-lg-4">
									<input required type="password" class="form-control" placeholder="{{ trans('dashboard.change_password.password_confirm') }}" name="password_confirmation" data-bv-field="password_confirmation"><i class="form-control-feedback" data-bv-icon-for="password_confirmation" style="display: none;"></i>
									@if ($errors->has('password_confirmation'))
										<small class="help-block" >{{ $errors->first('password_confirmation') }}</small>
									@endif
								</div>

							</div>
							<div class="form-group row gutter">
								<div class="col-lg-4 col-lg-offset-5">
									<button type="submit" class="btn btn-info">{{ trans('dashboard.change_password.submit') }}</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>