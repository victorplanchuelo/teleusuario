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
											<div class="col-md-2 col-md-offset-1">
												<label class="control-label">{{ trans('dashboard.profile.labels.code') }}</label>
												<input type="text" class="form-control input-sm" id="code" name="code" value="{!! $user->code !!}" disabled />
											</div>
											<div class="col-md-2 col-md-offset-2">
												<label class="control-label">{{ trans('dashboard.profile.labels.nif') }}</label>
												<input type="text" class="form-control input-sm" id="nif" name="nif" value="{!! $user->nif !!}" disabled />
											</div>
										</div>
										<div class="form-group row gutter has-feedback">
											<div class="col-md-6 col-md-offset-1">
												<label class="control-label">{{ trans('dashboard.profile.labels.name') }}</label>
												<input type="text" class="form-control input-sm" id="name" name="name" value="{!! $user->name !!}"  disabled />
											</div>
											<div class="col-md-3 col-md-offset-1">
												<label class="control-label">{{ trans('dashboard.profile.labels.alias') }}</label>
												<input type="text" class="form-control input-sm" id="alias" name="alias" value="{!! $user->alias !!}" disabled />
											</div>
										</div>
										<div class="form-group row gutter has-feedback">
											<div class="col-md-2 col-md-offset-1">
												<label class="control-label">{{ trans('dashboard.profile.labels.phone') }}</label>
												<input type="text" class="form-control input-sm" id="phone" name="phone" value="{!! $user->contact_phone !!}"  disabled />
											</div>
											<div class="col-md-2 col-md-offset-1">
												<label class="control-label">{{ trans('dashboard.profile.labels.connection_phone') }}</label>
												<input type="text" class="form-control input-sm" id="connection_phone" name="connection_phone" value="{!! $user->connection_phone !!}" disabled />
											</div>
											<div class="col-md-4 col-md-offset-1">
												<label class="control-label">{{ trans('dashboard.profile.labels.genre') }}</label>
												<input type="text" class="form-control input-sm" id="genre" name="genre" value="{!! $user->genre !!}" disabled />
											</div>
										</div>
										<div class="form-group row gutter has-feedback">
											<div class="col-md-4 col-md-offset-1">
												<label class="control-label">{{ trans('dashboard.profile.labels.email') }}</label>
												<input type="email" class="form-control input-sm" id="email" name="email" value="{!! $user->email !!}"  disabled />
											</div>
											<div class="col-md-2 col-md-offset-1">
												<label class="control-label">{{ trans('dashboard.profile.labels.birthdate') }}</label>
												<input type="text" class="form-control input-sm" id="birthdate" name="birthdate" value="{{ \Carbon\Carbon::createFromFormat("M d Y h:i:s:A", $user->birthdate)->format('Y-m-d') }}" disabled />
											</div>
											<div class="col-md-2 col-md-offset-1">
												<label class="control-label">{{ trans('dashboard.profile.labels.age') }}</label>
												<input type="number" class="form-control input-sm" id="age" name="age" readonly="readonly" disabled />
											</div>
										</div>
										<div class="form-group row gutter has-feedback">
											<div class="col-md-4 col-md-offset-1">
												<label class="control-label">{{ trans('dashboard.profile.labels.address') }}</label>
												<input type="text" class="form-control input-sm" id="address" name="address" value="{!! $user->address !!}"  disabled />
											</div>
											<div class="col-md-2 col-md-offset-1">
												<label class="control-label">{{ trans('dashboard.profile.labels.cp') }}</label>
												<input type="text" class="form-control input-sm" id="cp" name="cp" value="{!! $user->cp !!}"  disabled />
											</div>
										</div>
										<div class="form-group row gutter has-feedback">
											<div class="col-md-4 col-md-offset-1">
												<label class="control-label">{{ trans('dashboard.profile.labels.city') }}</label>
												<input type="text" class="form-control input-sm" id="city" name="city" value="{!! $user->city !!}"  disabled />
											</div>
											<div class="col-md-3">
												<label class="control-label">{{ trans('dashboard.profile.labels.province') }}</label>
												<input type="text" class="form-control input-sm" id="province" name="province" value="{!! $user->province !!}" disabled />
											</div>
											<div class="col-md-3">
												<label class="control-label">{{ trans('dashboard.profile.labels.country') }}</label>
												<input type="text" class="form-control input-sm" id="country" name="country" value="{!! $user->country !!}" disabled />
											</div>
										</div>
									</div>
									<div class="tab-pane" id="tabTwo">

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