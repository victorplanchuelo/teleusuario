
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



		@component('main.inc.top_bar')
			@slot('top_title', trans('dashboard.profile.title'))
			@slot('top_message', ''))

			@slot('top_level', 3)
			@slot('top_score', 25)
		@endcomponent


		<div class="row gutter">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="panel">
					<div class="panel-body">
						<div class="tabbable tabs-left clearfix">
							<ul class="nav nav-tabs">
								<li class="active">
									<a href="#tabPersonal" data-toggle="tab">{{ trans('dashboard.profile.tabs.general') }}</a>
								</li>
								<li>
									<a href="#tabBank" data-toggle="tab">{{ trans('dashboard.profile.tabs.bank') }}</a>
								</li>
								<li>
									<a href="#tabServices" data-toggle="tab">{{ trans('dashboard.profile.tabs.services') }}</a>
								</li>
								<li>
									<a href="#tabInvoices" data-toggle="tab">{{ trans('dashboard.profile.tabs.invoices') }}</a>
								</li>
							</ul>
							<div class="tab-content">
								<div class="tab-pane active" id="tabPersonal">
									<fieldset>
										<legend>{{ trans('dashboard.profile.fieldsets.user_data') }}</legend>
										<div class="form-group row gutter has-feedback">
											<div class="col-lg-2 col-lg-offset-1 col-md-3 col-md-offset-0 col-sm-3 col-sm-offset-0 col-xs-3 col-xs-offset-4 text-center">
												<div class="form-group row gutter has-feedback">
													<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
														<div class="user-img">
															<img id="image" class="img-thumbnail img-responsive" src="@if(is_null($user->thumb_path)) {{ asset('img/thumbs/user.png') }} @else {{ asset('storage/'.$user->thumb_path) }}@endif" alt="User Info">
														</div>
													</div>
													<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
														<div class="form-group row gutter has-feedback">
															<div class="btn-group">
																<form class="upload" action="{{ route('dashboard.profile.update') }}" method="post" enctype="multipart/form-data">
																	{{ csrf_field() }}
																	<input type="file" id="user_image" class="hidden" />
																	<a class="btn btn-info" id="upload-image"><i class="icon-upload4"></i>{{ trans('dashboard.profile.labels.upload_image') }}</a>
																	@if ($errors->has('file'))
																		<span class="help-block no-margin">
																			<strong>{{ $errors->first('file') }}</strong>
																		</span>
																	@endif
																</form>
															</div>
														</div>
													</div>
													<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 hidden" id="image_pbar">
														<div class="form-group row gutter has-feedback">
															<div class="progress no-margin progress-rounded progress-striped active">
																<div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;">
																	0%
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
												<div class="form-group row gutter has-feedback">
													<div class="col-lg-2 col-md-3 col-md-offset-1 col-sm-12 col-xs-12">
														<label for="code" class="control-label">{{ trans('dashboard.profile.labels.code') }}</label>
														<input type="text" class="form-control input-sm" id="code" name="code" value="{!! $user->code !!}" disabled />
													</div>
													<div class="col-lg-2 col-lg-offset-1 col-md-3 col-md-offset-1 col-sm-12 col-xs-12">
														<label for="alias" class="control-label">{{ trans('dashboard.profile.labels.alias') }}</label>
														<input type="text" class="form-control input-sm" id="alias" name="alias" value="{!! $user->alias !!}" disabled />
													</div>
													<div class="col-lg-2 col-lg-offset-1 col-md-2 col-md-offset-1 col-sm-12 col-xs-12 chk_profile_active">
														<div class="checkbox">
															<input type="checkbox" name="active" id="active" {{ ($user->active)? 'checked=checked':'' }} disabled> {{ trans('dashboard.profile.labels.active') }}
														</div>
													</div>
												</div>
												<div class="form-group row gutter has-feedback">
													<div class="col-lg-3 col-md-3 col-md-offset-1 col-sm-12 col-xs-12">
														<label for="start_date" class="control-label">{{ trans('dashboard.profile.labels.start_date') }}</label>
														<input type="text" class="form-control input-sm" id="start_date" name="start_date" value="{{\Carbon\Carbon::parse($user->start_date)->format('d/m/Y') }}" disabled />
													</div>

													<div class="col-lg-3 col-lg-offset-1 col-md-3 col-md-offset-1 col-sm-12 col-xs-12">
														<label for="end_date" class="control-label">{{ trans('dashboard.profile.labels.end_date') }}</label>
														<input type="text" class="form-control input-sm" id="end_date" name="end_date" value="{{ (!is_null($user->end_date)) ? \Carbon\Carbon::parse($user->end_date)->format('d/m/Y') : ''}}" disabled />
													</div>
												</div>
												<div class="form-group row gutter has-feedback">
													<div class="col-lg-7 col-md-9 col-md-offset-1 col-sm-12 col-xs-12">
														<label for="leave_reason" class="control-label">{{ trans('dashboard.profile.labels.leave_reason') }}</label>
														<textarea rows="2" class="form-control" id="leave_reason" name="leave_reason" disabled>{{ $user->leave_reason}}</textarea>
													</div>
												</div>
											</div>
										</div>
									</fieldset>
									<fieldset>
										<legend>{{ trans('dashboard.profile.fieldsets.personal_data') }}</legend>
										<div class="form-group row gutter has-feedback">
											<div class="col-lg-4 col-lg-offset-1 col-md-5  col-sm-12 col-xs-12">
												<label for="name" class="control-label">{{ trans('dashboard.profile.labels.name') }}</label>
												<input type="text" class="form-control input-sm" id="name" name="name" value="{!! $user->name !!}"  disabled />
											</div>
											<div class="col-lg-2 col-lg-offset-1 col-md-3 col-md-offset-1 col-sm-12 col-xs-12">
												<label for="nif" class="control-label">{{ trans('dashboard.profile.labels.nif') }}</label>
												<input type="text" class="form-control input-sm" id="nif" name="nif" value="{!! $user->nif !!}" disabled />
											</div>
										</div>
										<div class="form-group row gutter has-feedback">
											<div class="col-lg-2 col-lg-offset-1 col-md-3 col-sm-12 col-xs-12">
												<label for="birthdate" class="control-label">{{ trans('dashboard.profile.labels.birthdate') }}</label>
												<input type="text" class="form-control input-sm" id="birthdate" name="birthdate" value="{{ \Carbon\Carbon::createFromFormat("M d Y h:i:s:A", $user->birthdate)->format('d/m/Y') }}" disabled />
											</div>
											<div class="col-lg-1 col-lg-offset-1 col-md-2 col-md-offset-1 col-sm-12 col-xs-12">
												<label for="age" class="control-label">{{ trans('dashboard.profile.labels.age') }}</label>
												<input type="number" class="form-control input-sm" id="age" name="age" readonly="readonly" disabled />
											</div>
											<div class="col-lg-2 col-lg-offset-1 col-md-3 col-md-offset-1 col-sm-12 col-xs-12">
												<label for="genre" class="control-label">{{ trans('dashboard.profile.labels.genre.title') }}</label>
												<select class="form-control input-sm" name="genre" id="genre" disabled>
													<option value="0" {{($user->genre==0)?'selected':''}}>{{ trans('dashboard.profile.labels.genre.female') }}</option>
													<option value="1" {{($user->genre==1)?'selected':''}}>{{ trans('dashboard.profile.labels.genre.male') }}</option>
												</select>
											</div>
										</div>
										<div class="form-group row gutter has-feedback">
											<div class="col-lg-5 col-lg-offset-1 col-md-7 col-sm-12 col-xs-12">
												<label for="address" class="control-label">{{ trans('dashboard.profile.labels.address') }}</label>
												<input type="text" class="form-control input-sm" id="address" name="address" value="{!! $user->address !!}"  disabled />
											</div>
											<div class="col-lg-2 col-lg-offset-1 col-md-3 col-md-offset-1 col-sm-12 col-xs-12">
												<label for="cp" class="control-label">{{ trans('dashboard.profile.labels.cp') }}</label>
												<input type="text" class="form-control input-sm" id="cp" name="cp" value="{!! $user->cp !!}"  disabled />
											</div>
										</div>
										<div class="form-group row gutter has-feedback">
											<div class="col-lg-2 col-lg-offset-1 col-md-3 col-sm-12 col-xs-12">
												<label for="city" class="control-label">{{ trans('dashboard.profile.labels.city') }}</label>
												<input type="text" class="form-control input-sm" id="city" name="city" value="{!! $place->ciudad !!}"  disabled />
											</div>
											<div class="col-lg-2 col-lg-offset-1 col-md-3 col-md-offset-1 col-sm-12 col-xs-12">
												<label for="province" class="control-label">{{ trans('dashboard.profile.labels.province') }}</label>
												<input type="text" class="form-control input-sm" id="province" name="province" value="{!! $place->provincia !!}" disabled />
											</div>
											<div class="col-lg-2 col-lg-offset-1 col-md-3 col-md-offset-1 col-sm-12 col-xs-12">
												<label for="country" class="control-label">{{ trans('dashboard.profile.labels.country') }}</label>
												<input type="text" class="form-control input-sm" id="country" name="country" value="{!! $place->pais !!}" disabled />
											</div>
										</div>
										<div class="form-group row gutter has-feedback">
											<div class="col-lg-2 col-lg-offset-1 col-md-3 col-sm-12 col-xs-12">
												<label for="phone" class="control-label">{{ trans('dashboard.profile.labels.phone') }}</label>
												<input type="text" class="form-control input-sm" id="phone" name="phone" value="{!! $user->contact_phone !!}"  disabled />
											</div>
											<div class="col-lg-2 col-lg-offset-1 col-md-3 col-md-offset-1 col-sm-12 col-xs-12">
												<label for="connection_phone" class="control-label">{{ trans('dashboard.profile.labels.connection_phone') }}</label>
												<input type="text" class="form-control input-sm" id="connection_phone" name="connection_phone" value="{!! $user->connection_phone !!}" disabled />
											</div>
											<div class="col-lg-3 col-lg-offset-1 col-md-4 col-md-offset-1 col-sm-12 col-xs-12">
												<label for="email" class="control-label">{{ trans('dashboard.profile.labels.email') }}</label>
												<input type="email" class="form-control input-sm" id="email" name="email" value="{!! $user->email !!}"  disabled />
											</div>
										</div>
									</fieldset>

								</div>
								<div class="tab-pane" id="tabBank">
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
								<div class="tab-pane" id="tabServices">

								</div>
								<div class="tab-pane" id="tabInvoices">

								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<a id="scrollUp" href="#top" style="position: fixed; z-index: 2147483647;"><i class="icon-rocket"></i></a>