@if($success != 1)
	<div class="alert alert-danger">
		<ul class="list-unstyled">
			<li class="text-center">{{ $strErr }}</li>
		</ul>
	</div>
@endif

<!-- Row ends -->
<div class="row gutter">
	<div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
		<div class="panel panel-task-info">
			<div class="panel-heading">
				<h4>Información de la tarea</h4>
			</div>
			<div class="panel-body">
				<div class="panel-task-winks-info">
					<fieldset class="fieldset_info">
						<legend>Tus datos</legend>
						<div class="users-wrapper red">
							<div class="users-info clearfix">
								<div class="users-avatar">
									<img src="@if(collect($wink->imagenes_premium)->count()>0) {{ config('constants.URL_STATIC') . $wink->imagenes_premium->{1}->foto }} @else {{ asset('/img/thumbs/user.png') }} @endif" class="img-responsive img-premium" alt="{{$wink->nombre_premium}}">
								</div>
								<div class="users-detail">
									<h5 class="wink_info_name">
										<strong>{{ $wink->nombre_premium }}</strong>
										<a target="_blank" href="{{ $wink->link_premium }}">({{ $wink->id_link_premium }})</a>
									</h5>
									<h5><strong>{{ $wink->titulo_premium }}</strong></h5>
									<small>{{ $wink->contenido_premium }}</small>
								</div>
							</div>
							<ul class="users-footer clearfix">
								<li>
									<p class="light">Click para ampliar</p>
									@if(collect($wink->imagenes_premium)->count()>0)
										<div class="galleryPremium">
											@foreach($wink->imagenes_premium as $img)
												@if($img->borrado === "")
													<a href="{{ config('constants.URL_STATIC') . $img->{'250x250'} }}">
														<img @if($img->privada===1) class="border-red" @endif src="{{ config('constants.URL_STATIC') . $img->{'32x32'} }}" />
													</a>
												@endif
											@endforeach
										</div>
									@endif
								</li>
								<li>
									<p class="light">{{ trans('dashboard.task.wink.info.location') }}</p>
									<p> {{ $wink->ciudad_premium }} ({{ $wink->provincia_premium }})</p>
								</li>
							</ul>
						</div>
					</fieldset>
					<fieldset class="fieldset_info">
						<legend>Datos del cliente</legend>
						<div class="users-wrapper red">
							<div class="users-info clearfix">
								<div class="users-avatar">
									<img src="@if(collect($wink->imagenes_cliente)->count()>0) {{ config('constants.URL_STATIC') . $wink->imagenes_cliente->{1}->foto }}  @else {{ asset('/img/thumbs/user.png') }} @endif" class="img-responsive img-cliente" alt="{{$wink->nombre_cliente}}">
								</div>
								<div class="users-detail">
									<h5 class="wink_info_name">
										<strong>{{ $wink->nombre_cliente }}</strong>
										<a target="_blank" href="{{ $wink->link_cliente }}">({{ $wink->id_link_cliente }})</a>
									</h5>
									<h5><strong>{{ $wink->titulo_cliente }}</strong></h5>
									<small>{{ $wink->contenido_cliente }}</small>
								</div>
							</div>
							<ul class="users-footer clearfix">
								<li>
									<p class="light">Click para ampliar</p>
									@if(collect($wink->imagenes_cliente)->count()>0)
										<div class="galleryClient">
											@foreach($wink->imagenes_cliente as $img)
												@if($img->borrado === "")
													<a href="{{ config('constants.URL_STATIC') . $img->{'250x250'} }}">
														<img src="{{ config('constants.URL_STATIC') . $img->{'32x32'} }}" />
													</a>
												@endif
											@endforeach
										</div>
									@endif
								</li>
								<li>
									<p class="light">{{ trans('dashboard.task.wink.info.location') }}</p>
									<p> {{ $wink->ciudad_cliente }} ({{ $wink->provincia_cliente }})</p>
								</li>
							</ul>
						</div>
					</fieldset>
				</div>


				<?php
					/*

					 <div class="panel notes">
					<div class="panel-group" id="accordion">
						<fieldset class="fieldset_info">
							<a class="escribir_nota add-btn added" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
								<legend>Escribir Notas <i class="icon-plus3 pull-right"></i></legend>

							</a>
							<div id="collapseOne" class="panel-collapse collapse">
								<div class="panel-body">
									<form id="create_new_note" method="POST" data-conversation="@if($wink->conversacion_chat > 0) {{$wink->conversacion_chat}} @else 0 @endif" action="#">
										{{ csrf_field() }}
										<textarea class="form-control text-note" rows="3"></textarea>
										<button type="submit" class="btn btn-info">Enviar</button>
									</form>
								</div>
							</div>
						</fieldset>
						<fieldset class="fieldset_info">
							<a class="escribir_nota" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
								<legend>Notas de la conversación <i class="icon-plus3 pull-right"></i></legend>

							</a>
							<div id="collapseTwo" class="panel-collapse collapse">
								<div class="panel-body">
									<ul>
										@if($wink->conversacion_chat > 0)
											@foreach($wink->notas as $nota)
												<li>({{\Carbon\Carbon::parse($nota->fecha)->format('d/m/Y')}}) {!! nl2br($nota->texto) !!}</li>
											@endforeach
										@endif
									</ul>
								</div>
							</div>
						</fieldset>
					</div>
				</div>


					 * */
				?>

			</div>
		</div>
	</div>

	<?php

		/*

		<div class="col-lg-8 col-md-6 col-sm-6 col-xs-12">
		<div class="panel">
			<div class="panel-heading">
				<h4>Conversación (si tiene)</h4>
			</div>
			<div class="panel-body panel-task-messages">
				<ul class="chats">

					@foreach($wink->conversacion as $item)
						<li class="@if($item->usuario_destino == $wink->usuario_premium->usuario) in @else out @endif">
							<img class="avatar" alt="" src="@if($item->usuario_destino == $wink->usuario_premium->usuario) @if($wink->usuario_cliente->imagen == '') {{ asset('/img/thumbs/user.png') }} @else {{ $wink->usuario_cliente->imagen }} @endif @else @if($wink->usuario_premium->imagen == '') {{ asset('/img/thumbs/user.png') }} @else {{ $wink->usuario_premium->imagen }} @endif @endif" />
							<div class="message">
								<p class="date"><strong>@if($item->usuario_destino == $wink->usuario_premium->usuario){{ $wink->usuario_cliente->nombre }} @else {{$wink->usuario_premium->nombre}} @endif - {{$item->fecha}} {{$item->hora}}</strong></p>
								<p class="inffo">
									{!! nl2br(e($item->texto))!!}
									@if($item->num_fotos!= "")
										<div class="img-messages">
										@foreach($item->fotos as $foto)
											<a href="{{ $foto }}">
												<img class="img-responsive image-msg" src="{{ $foto }}">
											</a>
										@endforeach
										</div>
									@endif

									@if(isset($item->regalo_deluxe))
										<div class="tarjeta_regalo" id="regalo_deluxe_{{$item->regalo_deluxe->id}}">
												<span class="hidden-xs">
													De {{$item->regalo_deluxe->nombre_origen}} para {{$item->regalo_deluxe->nombre_destino}}
												</span>
											<img class="img-responsive img_tarjeta_regalo" src="{{ config('constants.URL_STATIC') }}{{$item->regalo_deluxe->tarjeta}}" />
										</div>
									@endif
								</p>

							</div>
						</li>
					@endforeach
				</ul>
			</div>
			<form id="send-message" method="POST" action="#">
				<div class="row gutter">
					{{ csrf_field() }}
					<input type="hidden" id="name-msg" data-name="{{$wink->usuario_premium->nombre}}" />
					<textarea class="form-control new-message" rows="3"></textarea>
					<button type="submit" class="btn btn-info">Enviar</button>
				</div>
			</form>
		</div>
	</div>


		 */
	?>

</div>