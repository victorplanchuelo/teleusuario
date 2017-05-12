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
						<h3>{{ trans('dashboard.profile.title') }}</h3>
					</div>
				</div>
			</div>
		</div>
		<div class="row gutter">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="panel">
					<div class="panel-heading">
						<h4>{{ trans('dashboard.profile.title') }}</h4>
					</div>
					<div class="panel-body">
						<form method="POST" action="{{ route('dashboard.change_pwd.edit') }}">
							{{ csrf_field() }}
							<div class="tabbable tabs-left clearfix">
								<ul class="nav nav-tabs">
									<li class="active">
										<a href="#tabOne" data-toggle="tab">{{ trans('dashboard.profile.tabs.personal') }}</a>
									</li>
									<li>
										<a href="#tabTwo" data-toggle="tab">{{ trans('dashboard.profile.tabs.bank') }}</a>
									</li>
									<li>
										<a href="#tabThree" data-toggle="tab">{{ trans('dashboard.profile.tabs.services') }}</a>
									</li>
								</ul>
								<div class="tab-content">
									<div class="tab-pane active" id="tabOne">
										<div class="form-group row gutter has-feedback">
											<div class="col-lg-2 col-lg-offset-1 col-md-3 col-md-offset-1 col-sm-12 col-xs-12">
												<label for="code" class="control-label">{{ trans('dashboard.profile.labels.code') }}</label>
												<input type="text" class="form-control input-sm" id="code" name="code" value="{!! $user->code !!}" disabled />
											</div>
											<div class="col-lg-2 col-lg-offset-1 col-md-3 col-md-offset-1 col-sm-12 col-xs-12">
												<label for="nif" class="control-label">{{ trans('dashboard.profile.labels.nif') }}</label>
												<input type="text" class="form-control input-sm" id="nif" name="nif" value="{!! $user->nif !!}" disabled />
											</div>
											<div class="col-lg-2 col-lg-offset-1 col-md-3 col-md-offset-1 col-sm-12 col-xs-12">
												<label for="alias" class="control-label">{{ trans('dashboard.profile.labels.alias') }}</label>
												<input type="text" class="form-control input-sm" id="alias" name="alias" value="{!! $user->alias !!}" disabled />
											</div>
										</div>
										<div class="form-group row gutter has-feedback">
											<div class="col-lg-2 col-lg-offset-1 col-md-3 col-md-offset-1 col-sm-12 col-xs-12">
												<label for="birthdate" class="control-label">{{ trans('dashboard.profile.labels.birthdate') }}</label>
												<input type="text" class="form-control input-sm" id="birthdate" name="birthdate" value="{{ \Carbon\Carbon::createFromFormat("M d Y h:i:s:A", $user->birthdate)->format('Y-m-d') }}" disabled />
											</div>
											<div class="col-lg-1 col-lg-offset-1 col-md-2 col-md-offset-1 col-sm-12 col-xs-12">
												<label for="age" class="control-label">{{ trans('dashboard.profile.labels.age') }}</label>
												<input type="number" class="form-control input-sm" id="age" name="age" readonly="readonly" disabled />
											</div>
										</div>
										<div class="form-group row gutter has-feedback">
											<div class="col-lg-4 col-lg-offset-1 col-md-5 col-md-offset-1 col-sm-12 col-xs-12">
												<label for="name" class="control-label">{{ trans('dashboard.profile.labels.name') }}</label>
												<input type="text" class="form-control input-sm" id="name" name="name" value="{!! $user->name !!}"  disabled />
											</div>
											<div class="col-lg-3 col-lg-offset-1 col-md-5 col-md-offset-1 col-sm-12 col-xs-12">
												<label for="email" class="control-label">{{ trans('dashboard.profile.labels.email') }}</label>
												<input type="email" class="form-control input-sm" id="email" name="email" value="{!! $user->email !!}"  disabled />
											</div>
										</div>
										<div class="form-group row gutter has-feedback">
											<div class="col-lg-2 col-lg-offset-1 col-md-3 col-md-offset-1 col-sm-12 col-xs-12">
												<label for="phone" class="control-label">{{ trans('dashboard.profile.labels.phone') }}</label>
												<input type="text" class="form-control input-sm" id="phone" name="phone" value="{!! $user->contact_phone !!}"  disabled />
											</div>
											<div class="col-lg-2 col-lg-offset-1 col-md-3 col-md-offset-1 col-sm-12 col-xs-12">
												<label for="connection_phone" class="control-label">{{ trans('dashboard.profile.labels.connection_phone') }}</label>
												<input type="text" class="form-control input-sm" id="connection_phone" name="connection_phone" value="{!! $user->connection_phone !!}" disabled />
											</div>
											<div class="col-lg-2 col-lg-offset-1 col-md-3 col-md-offset-1 col-sm-12 col-xs-12">
												<label for="genre" class="control-label">{{ trans('dashboard.profile.labels.genre') }}</label>
												<input type="text" class="form-control input-sm" id="genre" name="genre" value="{!! $user->genre !!}" disabled />
											</div>
										</div>
										<div class="form-group row gutter has-feedback">
											<div class="col-lg-2 col-lg-offset-1 col-md-3 col-md-offset-1 col-sm-12 col-xs-12">
												<label for="city" class="control-label">{{ trans('dashboard.profile.labels.city') }}</label>
												<input type="text" class="form-control input-sm" id="city" name="city" value="{!! $user->city !!}"  disabled />
											</div>
											<div class="col-lg-2 col-lg-offset-1 col-md-3 col-md-offset-1 col-sm-12 col-xs-12">
												<label for="province" class="control-label">{{ trans('dashboard.profile.labels.province') }}</label>
												<input type="text" class="form-control input-sm" id="province" name="province" value="{!! $user->province !!}" disabled />
											</div>
											<div class="col-lg-2 col-lg-offset-1 col-md-3 col-md-offset-1 col-sm-12 col-xs-12">
												<label for="country" class="control-label">{{ trans('dashboard.profile.labels.country') }}</label>
												<input type="text" class="form-control input-sm" id="country" name="country" value="{!! $user->country !!}" disabled />
											</div>
										</div>
										<div class="form-group row gutter has-feedback">
											<div class="col-lg-4 col-lg-offset-1 col-md-7 col-md-offset-1 col-sm-12 col-xs-12">
												<label for="address" class="control-label">{{ trans('dashboard.profile.labels.address') }}</label>
												<input type="text" class="form-control input-sm" id="address" name="address" value="{!! $user->address !!}"  disabled />
											</div>
											<div class="col-lg-2 col-lg-offset-1 col-md-3 col-md-offset-1 col-sm-12 col-xs-12">
												<label for="cp" class="control-label">{{ trans('dashboard.profile.labels.cp') }}</label>
												<input type="text" class="form-control input-sm" id="cp" name="cp" value="{!! $user->cp !!}"  disabled />
											</div>
										</div>
									</div>
									<div class="tab-pane" id="tabTwo">
										<div class="form-group row gutter has-feedback">
											<div class="col-lg-4 col-lg-offset-1 col-md-5 col-md-offset-1 col-sm-12 col-xs-12">
												<label class="control-label">{{ trans('dashboard.profile.labels.bank') }}</label>
												<input type="text" class="form-control input-sm" id="bank" name="bank" value="{!! $user->bank->name !!}" disabled />
											</div>
											<div class="col-lg-2 col-lg-offset-1 col-md-3 col-md-offset-1 col-sm-12 col-xs-12">
												<label class="control-label">{{ trans('dashboard.profile.labels.bank_code') }}</label>
												<input type="text" class="form-control input-sm" id="bank_code" name="bank_code" value="{!! $user->bank->code !!}" disabled />
											</div>
										</div>
										<div class="form-group row gutter has-feedback">
											<div class="col-lg-4 col-lg-offset-1 col-md-5 col-md-offset-1 col-sm-12 col-xs-12">
												<label class="control-label">{{ trans('dashboard.profile.labels.iban') }}</label>
												<input type="text" class="form-control input-sm" id="iban" name="iban" value="{!! $user->iban !!}" disabled />
											</div>
											<div class="col-lg-2 col-lg-offset-1 col-md-3 col-md-offset-1 col-sm-12 col-xs-12">
												<label class="control-label">{{ trans('dashboard.profile.labels.swift') }}</label>
												<input type="text" class="form-control input-sm" id="swift" name="swift" value="{!! $user->bank->swift !!}" disabled />
											</div>
										</div>
									</div>
									<div class="tab-pane" id="tabThree">

									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<a id="scrollUp" href="#top" style="position: fixed; z-index: 2147483647;"><i class="icon-rocket"></i></a>