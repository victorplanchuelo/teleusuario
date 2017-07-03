<!-- Custom JS -->
<script src="{{ asset('js/custom.js') }}"></script>
<script src="{{ asset('js/loading-overlay.min.js') }}"></script>

<script type="text/javascript" src="{{ asset('/js/firebase.js') }}"></script>
<script src="https://www.gstatic.com/firebasejs/3.4.0/firebase.js"></script>

<script src="https://static.opentok.com/v2/js/opentok.js"></script>
<script type="text/javascript" src="{{ asset('/js/opentok.js') }}"></script>

<!-- Gallery JS -->
<script src="{{ asset('js/gallery/baguetteBox.js') }}"></script>
<script src="{{ asset('js/gallery/plugins.js') }}"></script>

<script>
	window.translations = {
		privateKey: '{{ trans('dashboard.messages.form.pkey.message') }}'
	};
</script>


<script type="text/javascript">
	function ResponderConversacionBENovios(id_conversacion,btn)
	{
		if (!$(btn).hasClass('clicked'))//Si no ha sido clickado ya
		{
			var respuesta_id = 'respuesta_be-novios';
			var conversacion_div_id = 'novios-hablar';

			var mensaje =  $('#'+respuesta_id).val();

			if (mensaje.length < 50)
				alert('Debes introducir una respuesta con al menos 50 caracteres.');
			else
			{
				$.ajax({
					async:true,
					type: "POST",
					dataType: "json",
					contentType: "application/x-www-form-urlencoded",
					url:"/ajax.php?section=up_be_enviar_mensaje",
					data:
						{
							"conversacion":id_conversacion,
							"guinyo":0,
							"texto":mensaje,
							"novios":1
						},
					beforeSend:function()
					{
						$('body').css('cursor', 'wait');
						$(btn).addClass('clicked');
					},
					success:function(response)
					{
						$('body').css('cursor', 'default');

						if (response.exito > 0)
						{
							var mensaje_br = mensaje.replace(/(\r\n|\n\r|\r|\n)/g, "<br>");
							var div = '<div class="row-fluid">'+
								'<div class="span12" style="padding-bottom: 10px;" >'+
								'<div class="mensaje_premium" >'+
								'<span style="color:#000;font-size:12px;" >Ahora</span><br/>'+
								mensaje_br+
								'</div>'+
								'</div>'+
								'</div>';

							$('#'+conversacion_div_id+' .cuadro_conversacion').append(div);

							$('#'+respuesta_id).val('');

							var id_novio = $('#novios-hablar [id_novio]').attr('id_novio');
							$('#novios-listado [id_novio='+id_novio+']').remove();
						}
						else
							alert(response.exito.error);

						$(btn).removeClass('clicked');
					}
					,timeout:30000
					,error:function(objAJAXRequest,strError)
					{
						$(btn).removeClass('clicked');
						$('body').css('cursor', 'default');
						console.log(objAJAXRequest);
					}
				});
			}
		}
	}

	function ConfirmarAbrirChatNovio()
	{
		var anuncio_cliente = $('.cliente').data('anuncio');
		var anuncio_premium = $('.premium').data('anuncio');

		reset();
		alertify.confirm("Se va a abrir un chat con este usuario. ¿Estas seguro?", function (e) {
			if (e) {
				//alertify.success(anuncio_cliente + '---' + anuncio_premium);
				//Ha pulsado OK. Se le manda a chats y se le carga el nuevo chat
				AbrirChatNovio(anuncio_cliente, anuncio_premium);
			}
		});
		return false;
	}

	function AbrirChatNovio(cliente, premium)
	{
		$.ajax({
			async:true,
			type: "GET",
			dataType: "json",
			contentType: "application/x-www-form-urlencoded",
			url:"{{ route('dashboard.boyfriends.open_boyfriend_chat') }}",
			data:{
				'anuncio_cliente':cliente,
				'anuncio_premium':premium
			},
			beforeSend:function()
			{
				$('body').css('cursor', 'wait');
			},
			success:function(response)
			{
				$('body').css('cursor', 'default');

				if (response.success === 1)
				{
					//SE HA CREADO. Alertify y redirección???
					alertify.success("{{ trans('dashboard.boyfriends.load_boyfriend_chat.success') }}");

					setTimeout(function() {
						window.location.href = '{{ route('dashboard.chats') }}';
					}, 2500);
				}
				else
				{
					//ERROR
					console.log(response);
					alertify.error(response.error);
				}
			},
			timeout:30000,
			error:function(objAJAXRequest,strError)
			{
				$('body').css('cursor', 'default');
				console.log(objAJAXRequest);
			}
		});
	}

	function MostrarEnviarMensajeNovio(id_novio)
	{
		var anuncio_cliente = $('.cliente').data('anuncio');
		var anuncio_premium = $('.premium').data('anuncio');

		$.ajaxSetup({
			headers:
				{
					'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
				}
		});

		$.ajax({
			async:true,
			type: "POST",
			dataType: "json",
			contentType: "application/x-www-form-urlencoded",
			url:"{{ route('dashboard.boyfriends.conversation') }}",
			data: {
				'anuncio_cliente':anuncio_cliente,
				'anuncio_premium':anuncio_premium
			},
			beforeSend:function()
			{
				$('body').css('cursor', 'wait');
			},
			success:function(response)
			{
				$('body').css('cursor', 'default');

				var m = loadMessage(response.message);
				$('#conversacion').html(m);
				MostrarUltimoMensaje();

				//Añadimos al div de la conversacion el id de la conversacion
				$('#conversacion').attr('data-id', response.conversation);


				//Creamos la llamada AJAX del botón de enviar mensaje
				$('.btn-send-msg').on('click', function(e){
					e.preventDefault();

					//Recuperamos el id de la conversacion
					var id_conversacion = $('#conversacion').data('id');
					var texto_mensaje = $('.new-message').val();

					$.ajaxSetup({
						headers:
							{
								'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
							}
					});

					$.ajax({
						async:true,
						type: "POST",
						dataType: "json",
						contentType: "application/x-www-form-urlencoded",
						url:"{{ route('dashboard.boyfriends.send_message') }}",
						data: {
							'texto':texto_mensaje,
							'conversacion': id_conversacion
						},
						beforeSend:function()
						{
							$('body').css('cursor', 'wait');
						},
						success:function(data)
						{
							$('body').css('cursor', 'default');

							//Cuando el mensaje ya se ha enviado, debemos hacer como los mensajes. Hacer la transición
							// para cargar el nuevo novio
							if(data.success === 0)
							{
								$.each(data.error, function(index, msg){
									alertify.error(msg);
								});
								return false;
							}

							//Si no es 0 quiere decirse que se ha enviado el mensaje
							alertify.success('{{ trans('dashboard.task.message.send_message.success') }}');

							//Habría que quitar las 3 ultimas lineas de código, ya que al enviar el mensaje bien
							// debería cerrar el div de los datos, lanzar el spinner y mostrar los datos de otro mensaje
							//loadNewMessage();
							loadNewBoyfriend();

						}
						,timeout:30000,
						error: function(response) {
							$('body').css('cursor', 'default');
							alertify.error(response.responseText);
						}
					});

				});

				//AQUI FALTA LA ACCION DEL BOTÓN DE ENVIAR LLAVE PRIVADA
				$("#send-private-key").on( 'click', function () {
					pkey(anuncio_premium, anuncio_cliente);
					return false;
				});


			}
			,timeout:30000
			,error:function(objAJAXRequest,strError)
			{
				$('body').css('cursor', 'default');
				console.log(objAJAXRequest);
			}
		});

	}

	function loadNewBoyfriend()
	{
		$('.novios').hide(1000, function() {
			$(this).html('');
			muestraNovios();
			firebase_NoviosConectados();
			$(this).show(1000);
		});
	}

	function loadMessage(msg)
	{
		var html = '';
		var clase='';
		var avatar='';
		var nombre='';

		html+='<div class="panel"><div class="panel-body panel-task-messages"><ul class="chats">';
		$.each(msg.conversacion, function(index, value) {
			clase = (value.usuario_destino === msg.usuario_premium.usuario) ? 'in' : 'out';
			html+='<li class="' + clase + '">';
			if(value.usuario_destino === msg.usuario_premium.usuario)
			{
				if(msg.usuario_cliente.imagen === '')
					avatar='{{ asset('/img/thumbs/user.png') }}';
				else
					avatar=msg.usuario_cliente.imagen;
			}
			else
			{
				if(msg.usuario_premium.imagen === '')
					avatar='{{ asset('/img/thumbs/user.png') }}';
				else
					avatar = msg.usuario_premium.imagen;
			}

			html+='<img class="avatar" alt="" src="' + avatar + '" />';
			html+='<div class="message"><p class="date">';
			if(value.usuario_destino === msg.usuario_premium.usuario)
				nombre =  msg.usuario_cliente.nombre;
			else
				nombre = msg.usuario_premium.nombre;

			html+='<strong>' + nombre + ' - ' + value.fecha + value.hora + '</strong></p>';
			html+='<p class="inffo">';
			html+=value.texto;
			if(value.num_fotos!== "")
			{
				html+='<div class="img-messages">';
				$.each(value.fotos, function(index2, value2) {
					html+='<a href="' + value2 + '"><img class="img-responsive image-msg" src="' + value2 + '"></a>';
				});
				html+='</div>';
			}
			if(typeof value.regalo_deluxe !== 'undefined')
			{
				html+='<div class="tarjeta_regalo" id="regalo_deluxe_' + value.regalo_deluxe.id+ '"><span class="hidden-xs">';
				html+='De '+ value.regalo_deluxe.nombre_origen +' para '+ value.regalo_deluxe.nombre_destino ;
				html+='</span><img class="img-responsive img_tarjeta_regalo" src="https://static.liruch.com/' + value.regalo_deluxe.tarjeta +'" />';
				html+='</div>';
			}
			html+='</p></div></li>';
		});

		html+='</ul></div><div class="panel-footer"><div class="row gutter"><div class="row gutter">' +
			'<form id="send-message" method="POST" action="#"><div class="col-lg-10 col-sm-8 col-md-12 col-xs-12">' +
			'<input type="hidden" id="name-msg" data-name="' + msg.usuario_premium.nombre + '" />' +
			'<textarea class="form-control new-message" rows="3"></textarea></div>' +
			'<div class="col-lg-2 col-sm-4 col-md-12 col-xs-12">' +
			'<a href="#" class="btn btn-success btn-block btn-send-msg">';
		html+= '{{ trans('dashboard.messages.form.submit') }}';
		html+='</a></div></form></div>';

		if(msg.tiene_fotos_privadas)
		{
			html+='<br/><div class="row gutter">';
			html+='<form id="send-private-key" method="POST" action="{{ route('dashboard.message.send_private_key') }}">';
			html+='<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">';
			html+='<input type="hidden" id="pkey-msg" data-message="' + window.translations.privateKey + '" />';
			html+='<a href="#" class="btn btn-info" id="send-private-key">';
			html+='<span class="circless animate" style="height: 80px; width: 80px; top: -19px; left: -6.26562px;"></span>';
			html+='<i class="icon-key"></i>{{ trans('dashboard.messages.form.pkey.title') }}</a></div></form></div>';
		}

		html+='</div></div></div>';

		return html;

	}

	function muestraNovios()
	{
		console.log('muestra novios');
		$('#spinner').show();
		$('#spinner').removeClass('hidden');
		$('#spinner').loadingOverlay();

		$.ajaxSetup({
			headers:
				{
					'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
				}
		});

		$.ajax({
			type: 'GET',
			url: '{{ route('dashboard.boyfriends') }}',
			data: {},
			async: false,
			dataType: "json",
			contentType: "application/x-www-form-urlencoded",
			beforeSend: function() {
				$('body').css('cursor', 'wait');

			},
			success: function(response) {
				console.log(response);

				$('body').css('cursor', 'default');
				$('#spinner').loadingOverlay('remove');
				$('#spinner').hide();

				if(response.success===0)
				{
					if(response.boyfriends.error2===1)
					{
						var errMsg = '<p>{{ trans('dashboard.boyfriends.errors.no_boyfriends_or_message_already_sent') }}'
							+ response.boyfriends.frecuencia_envio + '{{ trans('dashboard.boyfriends.errors.no_boyfriends_or_message_already_sent_2') }}</p>'
							+'<p>{{ trans('dashboard.boyfriends.errors.no_boyfriends_or_message_already_sent_3') }}'
							+ response.boyfriends.req_mensajes_enviados + '{{ trans('dashboard.boyfriends.errors.no_boyfriends_or_message_already_sent_4') }}'
							+ response.boyfriends.req_minutos_hablados + '{{ trans('dashboard.boyfriends.errors.no_boyfriends_or_message_already_sent_5') }}</p>';

						$('.novios').html('<span class="alert alert-danger col-lg-12 col-md-12 col-sm-12 col-xs-12">' + errMsg + '</span>');
						alertify.error(errMsg);
					}
					else
					{
						alertify.error("Se ha producido un error al cargar el novio o no tienes más novios a cargar")
					}
					return false;
				}

				$('.novios').append(response.boyfriends.html);
			},
			timeout:60000,
			fail: function(objAJAXRequest,strError) {
				console.log('AJAX FAIL');
				$('body').css('cursor', 'default');
				$('#spinner').loadingOverlay('remove');
				$('#spinner').hide();

			}
		});
	}

	//Hace un scroll hasta el último mensaje enviado
	function MostrarUltimoMensaje()
	{
		if($('.panel-task-messages').length)
		{
			var d = $('.panel-task-messages');
			d.scrollTop(d.prop("scrollHeight"));
		}
	}

	$(document).ready(function() {
		// Initialize Firebase
		var config = {
			apiKey: "AIzaSyCFsXB-qRqacz3JfwliVuYew5o285ELY_c",
			authDomain: "liruch-50ed4.firebaseapp.com",
			databaseURL: "https://liruch-50ed4.firebaseio.com",
			storageBucket: "liruch-50ed4.appspot.com",
			messagingSenderId: "1092206030458"
		};
		firebase.initializeApp(config);

		muestraNovios();
		firebase_NoviosConectados();

	});
</script>