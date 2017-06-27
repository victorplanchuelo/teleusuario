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
		var anuncio_cliente = $('#novios-listado [id_novio='+id_novio+'] [anuncio_cliente]');
		var anuncio_premium = $('#novios-listado [id_novio='+id_novio+'] [anuncio_premium]');

		var html = '<div class="box-generic" id_novio="'+id_novio+'">' +
			'<div class="row-fluid" style="font-weight:bold;"' +
			'><div class="span6">CLIENTE</div> ' +
			'<div class="span6">PREMIUM</div>' +
			'</div> ' +
			'<div class="row-fluid">' +
			'<div class="span6">' +
			'<img src="'+$(anuncio_cliente).find('[foto]').attr('src')+'"> ' +
			'<span style="margin-left:10px;">'+$(anuncio_cliente).find('[nombre]').html()+'</span>' +
			'</div> ' +
			'<div class="span6">' +
			'<img src="'+$(anuncio_premium).find('[foto]').attr('src')+'"> ' +
			'<span style="margin-left:10px;">'+$(anuncio_premium).find('[nombre]').html()+'</span>' +
			'</div>' +
			'</div>' +
			'</div>';

		$.ajax({
			async:true,
			type: "POST",
			dataType: "json",
			contentType: "application/x-www-form-urlencoded",
			url:"/ajax.php?section=up_be_leer_conversacion_novios",
			data: {
				'anuncio_cliente':$(anuncio_cliente).attr('id_anuncio'),
				'anuncio_premium':$(anuncio_premium).attr('id_anuncio')
			},
			beforeSend:function()
			{
				$('body').css('cursor', 'wait');
			},
			success:function(response)
			{
				$('body').css('cursor', 'default');

				$('#novios-hablar').html(html+response.html);
				$('#novios-hablar .cuadro_conversacion').scrollTop($('#novios-hablar .cuadro_conversacion').prop('scrollHeight'));
			}
			,timeout:30000
			,error:function(objAJAXRequest,strError)
			{
				$('body').css('cursor', 'default');
				console.log(objAJAXRequest);
			}
		});

	}

	function ReordenarNovios()
	{
		console.log('reordenar novios');
		var $novios = $('#boyfriends'),
			$novio_div = $novios.find('.panel-boyfriend').parent();

		$novio_div.sort(function(a,b){
			var an = $(a).hasClass('conectado'),
				bn = $(b).hasClass('conectado'),
				an2 = parseInt($(a).attr('data-novio')),
				bn2 = parseInt($(b).attr('data-novio'));

			if (an && !bn)
				return -1;
			if (!an && bn)
				return 1;

			if (an2 > bn2)
				return -1;
			if (an2 < bn2)
				return 1;

			return 0;
		});

		$novio_div.detach().appendTo($novios[0].firstElementChild);
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
				setTimeout(ReordenarNovios,3000);

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

		setInterval(ReordenarNovios,60000);

	});
</script>