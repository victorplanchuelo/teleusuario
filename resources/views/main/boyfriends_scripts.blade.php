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

	function ConfirmarAbrirChatNovio(id_novio)
	{
		var anuncio_cliente = $('#novios-listado [id_novio='+id_novio+'] [anuncio_cliente]');
		var anuncio_premium = $('#novios-listado [id_novio='+id_novio+'] [anuncio_premium]');


		//var html = '<div class="row-fluid box-generic"><div class="span12">Vas a abrirle un chat a</div> <div class="span12"><img src="'+$(anuncio_cliente).find('[foto]').attr('src')+'"> <span style="margin-left:10px;">'+$(anuncio_cliente).find('[nombre]').html()+'</span></div> <div class="span12" style="margin-top:20px;">con el siguiente perfil</div> <div class="span12"><img src="'+$(anuncio_premium).find('[foto]').attr('src')+'"> <span style="margin-left:10px;">'+$(anuncio_premium).find('[nombre]').html()+'</span></div> <div class="span12" style="margin-top:20px;">¿Estás seguro?<br><button class="btn btn-success" onclick="AbrirChatNovio('+id_novio+')">Sí</button> <button class="btn btn-danger" onclick="$(\'#novios-hablar\').empty()" style="margin-left:20px;">No</button></div> </div>';

		var html = '<div class="box-generic"><div class="row-fluid" style="font-weight:bold;"><div class="span6">CLIENTE</div> <div class="span6">PREMIUM</div></div> <div class="row-fluid"><div class="span6"><img src="'+$(anuncio_cliente).find('[foto]').attr('src')+'"> <span style="margin-left:10px;">'+$(anuncio_cliente).find('[nombre]').html()+'</span></div> <div class="span6"><img src="'+$(anuncio_premium).find('[foto]').attr('src')+'"> <span style="margin-left:10px;">'+$(anuncio_premium).find('[nombre]').html()+'</span></div></div> <div class="row-fluid" style="margin-top:20px;"><div class="span12">Vas a abrir un chat a este cliente con este perfil premium. ¿Estás seguro?<br><button class="btn btn-success" onclick="AbrirChatNovio('+id_novio+')">Sí</button> <button class="btn btn-danger" onclick="$(\'#novios-hablar\').empty()" style="margin-left:20px;">No</button></div></div></div>';

		$('#novios-hablar').html(html);
	}

	function AbrirChatNovio(id_novio)
	{
		$.ajax({
			async:true,
			type: "POST",
			dataType: "json",
			contentType: "application/x-www-form-urlencoded",
			url:"ajax.php?section=up_abrir_chat_novio",
			data:{
				'anuncio_cliente':$('#novios-listado [id_novio='+id_novio+'] [anuncio_cliente]').attr('id_anuncio'),
				'anuncio_premium':$('#novios-listado [id_novio='+id_novio+'] [anuncio_premium]').attr('id_anuncio')
			},
			beforeSend:function()
			{
				$('body').css('cursor', 'wait');
			},
			success:function(response)
			{
				$('body').css('cursor', 'default');

				if (response.exito == 1)
				{
					$('#novios-hablar').html('<p class="alert" style="font-size:16px;">Pulsa en la pestaña de chat y en breve aparecerá el nuevo chat.<br><button onclick="$(\'[href=#Chat]\').click()" class="btn btn-default">Ir al chat</button></p>');
					$('#novios-listado [id_novio='+id_novio+']').remove();
				}
				else
					$('#novios-hablar').html('<p class="alert" style="font-size:16px;">'+response.error+'</p>');
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
			}
			,timeout:30000
			,error:function(objAJAXRequest,strError)
			{
				$('body').css('cursor', 'default');
				console.log(objAJAXRequest);
			}
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
			'<button type="submit" class="btn btn-success btn-block">';
		html+= '{{ trans('dashboard.messages.form.submit') }}';
		html+='</button></div></form></div>';

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