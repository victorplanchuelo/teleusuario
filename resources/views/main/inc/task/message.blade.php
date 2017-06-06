@if($success != 1)
	<div class="alert alert-danger">
		<ul class="list-unstyled">
			<li class="text-center">{{ $strErr }}</li>
		</ul>
	</div>
@endif

<!-- Row ends -->
<div clsass="row gutter">
	<div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
		<div class="panel panel-task-info">
			<div class="panel-body">
				<div class="panel-task-messages-info">
					<fieldset class="fieldset_info">
						<legend>Tus datos</legend>
						<div class="users-wrapper red">
							<div class="users-info clearfix">
								<div class="users-avatar">
									<img src="@if($message->usuario_premium->imagen == '') {{ asset('/img/thumbs/user.png') }} @else {{ $message->usuario_premium->imagen }} @endif" class="img-responsive img-premium" alt="{{$message->usuario_premium->nombre}}">
								</div>
								<div class="users-detail">
									<h5 class="message_info_name">
										<strong class="nombre_premium">{{ $message->usuario_premium->nombre }}</strong>
										<a target="_blank" class="id_anuncio_premium" data-anuncio="{{ $message->usuario_premium->anuncio }}" href="{{ $message->usuario_premium->enlace }}">({{ $message->usuario_premium->anuncio }})</a>
									</h5>
									<h5><strong>{{ $message->usuario_premium->titulo }}</strong></h5>
									<small>{{ $message->usuario_premium->descripcion }}</small>
								</div>
							</div>
							<ul class="users-footer clearfix">
								<li>
									<p class="light">Click para ampliar</p>
									@if(collect($message->usuario_premium->imagenes)->count()>0)
										<div class="galleryPremium">
											@foreach($message->usuario_premium->imagenes as $img)
												@if($img->borrado === "")
													<a href="{{ config('constants.URL_STATIC') . $img->{'250x250'} }}">
														<img @if($img->privada===1 || $img->clasificacion!="1") class="border-red" @endif src="{{ config('constants.URL_STATIC') . $img->{'32x32'} }}" />
													</a>
												@endif
											@endforeach
										</div>
									@endif
								</li>
								<li>
									<p class="light">{{ trans('dashboard.task.message.info.location') }}</p>
									<p class="location"> {{ $message->usuario_premium->ciudad }} ({{ $message->usuario_premium->provincia }})</p>
								</li>
							</ul>
						</div>
					</fieldset>
					<fieldset class="fieldset_info">
						<legend>Datos del cliente</legend>
						<div class="users-wrapper red">
							<div class="users-info clearfix">
								<div class="users-avatar">
									<img src="@if($message->usuario_cliente->imagen == '') {{ asset('/img/thumbs/user.png') }} @else {{ $message->usuario_cliente->imagen }} @endif" class="img-responsive img-cliente" alt="Arise Admin">
								</div>
								<div class="users-detail">
									<h5 class="message_info_name">
										<strong class="nombre_cliente">{{ $message->usuario_cliente->nombre }}</strong>
										<a target="_blank" class="id_anuncio_cliente" data-anuncio="{{ $message->usuario_cliente->anuncio }}" href="{{ $message->usuario_cliente->enlace }}">({{ $message->usuario_cliente->anuncio }})</a>
									</h5>
									<h5><strong>{{ $message->usuario_cliente->titulo }}</strong></h5>
									<small>{{ $message->usuario_cliente->descripcion }}</small>
								</div>
							</div>
							<ul class="users-footer clearfix">
								<li>
									<p class="light">Click para ampliar</p>
									@if(collect($message->usuario_cliente->imagenes)->count()>0)
										<div class="galleryClient">
											@foreach($message->usuario_cliente->imagenes as $img)
												@if($img->borrado === "")
													@if(($img->privada===0 || $img->clasificacion==="1") || $message->permiso_fotos_privadas===true)
														<a href="{{ config('constants.URL_STATIC') . $img->{'250x250'} }}">
															<img @if($img->privada===1 || $img->clasificacion!=="1") class="border-red" @endif src="{{ config('constants.URL_STATIC') . $img->{'32x32'} }}" />
														</a>
													@endif
												@endif
											@endforeach
										</div>
									@endif
								</li>
								<li>
									<p class="light">{{ trans('dashboard.task.message.info.location') }}</p>
									<p class="location"> {{ $message->usuario_cliente->ciudad }} ({{ $message->usuario_cliente->provincia }})</p>
								</li>
							</ul>
						</div>
					</fieldset>
				</div>
				<div class="panel notes">
					<div class="panel-group" id="accordion">
						<fieldset class="fieldset_info">
							<a class="escribir_nota add-btn added" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
								<legend>Escribir Notas <i class="icon-plus3 pull-right"></i></legend>

							</a>
							<div id="collapseOne" class="panel-collapse collapse">
								<div class="panel-body">
									<form id="create_new_note" method="POST" data-conversation="@if($message->conversacion_chat > 0) {{$message->conversacion_chat}} @else 0 @endif" action="#">
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
										@if($message->conversacion_chat > 0)
											@foreach($message->notas as $nota)
												<li>({{\Carbon\Carbon::parse($nota->fecha)->format('d/m/Y')}}) {!! nl2br($nota->texto) !!}</li>
											@endforeach
										@endif
									</ul>
								</div>
							</div>
						</fieldset>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-8 col-md-6 col-sm-6 col-xs-12">
		<div class="panel">
			<div class="panel-body panel-task-messages">
				<ul class="chats">

					@foreach($message->conversacion as $item)
						<li class="@if($item->usuario_destino == $message->usuario_premium->usuario) in @else out @endif">
							<img class="avatar" alt="" src="@if($item->usuario_destino == $message->usuario_premium->usuario) @if($message->usuario_cliente->imagen == '') {{ asset('/img/thumbs/user.png') }} @else {{ $message->usuario_cliente->imagen }} @endif @else @if($message->usuario_premium->imagen == '') {{ asset('/img/thumbs/user.png') }} @else {{ $message->usuario_premium->imagen }} @endif @endif" />
							<div class="message">
								<p class="date"><strong>@if($item->usuario_destino == $message->usuario_premium->usuario){{ $message->usuario_cliente->nombre }} @else {{$message->usuario_premium->nombre}} @endif - {{$item->fecha}} {{$item->hora}}</strong></p>
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
			<div class="panel-footer">
				<form id="send-message" method="POST" action="#">
					<div class="row gutter">
						<div class="col-lg-10 col-sm-10 col-md-10 col-xs-12">
							{{ csrf_field() }}
							<input type="hidden" id="name-msg" data-name="{{$message->usuario_premium->nombre}}" />
							<textarea class="form-control new-message" rows="3"></textarea>
						</div>
						<div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
							<button type="submit" class="btn btn-success">{{trans('dashboard.messages.form.submit')}}</button>
						</div>
					</div>
				</form>
				@if($message->tiene_fotos_privadas)
					<form id="send-private-key" method="POST" action="{{ route('dashboard.message.send_private_key') }}">
						<input type="hidden" id="pkey-msg" data-message="{{trans('dashboard.messages.form.pkey.message')}}" />
						<a href="#" class="btn btn-info" id="send-private-key">
							<span class="circless animate" style="height: 80px; width: 80px; top: -19px; left: -6.26562px;"></span>
							<i class="icon-key"></i>
							{{trans('dashboard.messages.form.pkey.title')}}
						</a>
					</form>
				@endif
			</div>
		</div>
	</div>
</div>