<!-- Row ends -->
<div class="col-lg-12">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3>Listado de Notificaciones</h3>
		</div>
		<div class="panel-body">
			<div class="col-lg-12">
				<div class="table-responsive">
					<table class="table table-hover no-margin table-condensed" style="border-collapse:collapse;">
						<thead>
						<tr>
							<th>Tipo de Mensaje</th>
							<th>Fecha</th>
							<th>Leido</th>
						</tr>
						</thead>
						<tbody>
						@if (count($notifications)>0)
							<!-- AQUI SE MOSTRARA EL DATATABLE DE LOS MENSAJES. VER EL TEMPLATE -->
							<?php $cont=0; ?>
							@foreach(Auth::user()->unreadNotifications as $notification)
								<?php
								switch ($notification->data['type'])
								{
									case 1: //ERROR
										$label = 'danger';
										$title = trans("dashboard.notifications.data.title.error");
										$color = "red-bg";
										$logo = "icon-cross2";
										break;
									case 2: //WARNING
										$label = 'warning';
										$title = trans('dashboard.notifications.data.title.warning');
										$color = "yellow-bg";
										$logo = "icon-info";
										break;
									case 3: //INFO
										$label = 'info';
										$title = trans('dashboard.notifications.data.title.info');
										$color = "blue-bg";
										$logo = "icon-comment-stroke";
										break;
									case 4: //SUCCESS
										$label = "success";
										$title = trans('dashboard.notifications.data.title.success');
										$color = "green-bg";
										$logo = "icon-trophy";
										break;
									default: //POR DEFECTO, INFO
										$label = 'info';
										$title = trans('dashboard.notifications.data.title.info');
										$color = "blue-bg";
										$logo = "icon-comment-stroke";
										break;
								}
								?>

								<tr data-toggle="collapse" class="notification" data-id="{{$notification->id}}" data-target="#demo{{$cont}}">
									<td><span class="label label-{{$label}} label-bdr">{{$title}}</span></td>
									<td>07/07/2017 20:33</td>
									<td>
										<button class="btn btn-danger btn-xs">
											<span class="glyphicon glyphicon-eye-open"></span>
										</button>
									</td>
								</tr>
								<tr>
									<td colspan="5" style="padding: 0;">
										<div aria-expanded="false" class="collapse" id="demo{{$cont}}">
											<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12 no-margin no-padding">
												<div class="alert {{ $color }} no-border" style="margin: 0 !important;">
													<i class="{{ $logo }}"></i>
													<br>
													<p class="text-white center-text">{!! nl2br(e($notification->data['message'])) !!}</p>
												</div>
											</div>
										</div>
									</td>
								</tr>

								<?php $cont++; ?>
							@endforeach


							<?php $cont=0; ?>
							@foreach(Auth::user()->readNotifications as $notification)
								<?php
								switch ($notification->data['type'])
								{
									case 1: //ERROR
										$label = 'danger';
										$title = trans("dashboard.notifications.data.title.error");
										$color = "red-bg";
										$logo = "icon-cross2";
										break;
									case 2: //WARNING
										$label = 'warning';
										$title = trans('dashboard.notifications.data.title.warning');
										$color = "yellow-bg";
										$logo = "icon-info";
										break;
									case 3: //INFO
										$label = 'info';
										$title = trans('dashboard.notifications.data.title.info');
										$color = "blue-bg";
										$logo = "icon-comment-stroke";
										break;
									case 4: //SUCCESS
										$label = "success";
										$title = trans('dashboard.notifications.data.title.success');
										$color = "green-bg";
										$logo = "icon-trophy";
										break;
									default: //POR DEFECTO, INFO
										$label = 'info';
										$title = trans('dashboard.notifications.data.title.info');
										$color = "blue-bg";
										$logo = "icon-comment-stroke";
										break;
								}
								?>

								<tr data-toggle="collapse" class="notification" data-id="{{$notification->id}}" data-target="#demo{{$cont}}">
									<td><span class="label label-{{$label}} label-bdr">{{$title}}</span></td>
									<td>07/07/2017 20:33</td>
									<td>
										<button class="btn btn-success btn-xs">
											<span class="glyphicon glyphicon-eye-open"></span>
										</button>
									</td>
								</tr>
								<tr>
									<td colspan="5" style="padding: 0;">
										<div aria-expanded="false" class="collapse" id="demo{{$cont}}">
											<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12 no-margin no-padding">
												<div class="alert {{ $color }} no-border" style="margin: 0 !important;">
													<i class="{{ $logo }}"></i>
													<br>
													<p class="text-white center-text">{!! nl2br(e($notification->data['message'])) !!}</p>
												</div>
											</div>
										</div>
									</td>
								</tr>

								<?php $cont++; ?>
							@endforeach
						@else
							<tr>
								<td>
									<p>{{ trans('dashboard.notifications.data.empty') }}</p>
								</td>
							</tr>
						@endif
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>