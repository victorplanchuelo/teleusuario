<!-- Custom JS -->
<script src="{{ asset('js/custom.js') }}"></script>
<script src="{{ asset('js/loading-overlay.min.js') }}"></script>

<!-- Gallery JS -->
<script src="{{ asset('js/gallery/baguetteBox.js') }}"></script>
<script src="{{ asset('js/gallery/plugins.js') }}"></script>



<!-- ARCHIVOS NECESARIOS PARA EL TEMA DEL CHAT, QUE VIENE DEL ANTIGUO TELEUSUARIO-->
<script type="text/javascript" src="{{ asset('/js/TimeCircles.js') }}"></script>';

<script type="text/javascript" src="{{ asset('/js/firebase.js') }}"></script>
<script src="https://www.gstatic.com/firebasejs/3.4.0/firebase.js"></script>

<script src="https://static.opentok.com/v2/js/opentok.js"></script>
<script type="text/javascript" src="{{ asset('/js/opentok.js') }}"></script>
<!-------------------------------- FIN ----------------------------------------------->


<script type="text/javascript">

	//////////////VARIABLES GLOBALES
	var g_movil=0;
	var conversacion_actual=0;
	var lenap=1;
	// $_SERVER['REMOTE_ADDR']
	var prueba=1;
	var chat_activo=0;
	///////////////////////////////////////////

	function ActualizarConexionPremium()
	{
		// CSRF protection
		$.ajaxSetup(
			{
				headers:
					{
						'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
					}
			});

		jQuery.ajax({
			async:true,
			type: "POST",
			dataType: "json",
			contentType: "application/x-www-form-urlencoded",
			url: "{{ route('dashboard.chats.update_premium_connection') }}",
			data: {  },
			beforeSend:function() { },
			success:function(response) { console.log(response); }
			,timeout:60000
			,error:function(objAJAXRequest,strError,response) { }
		});
		setTimeout(function(){ ActualizarConexionPremium(); }, 200000);
	}



	function HtmlActualizarConversacionesUsuarioPremium(conversacion,datos)
	{
		console.log('llega a cargar conversacion');
		var video_chat=0;
		if(datos.video!==null && typeof datos.video !== "undefined")
			video_chat=1;

		if(!ExisteConversacionEnPantalla(conversacion))
		{
			console.log('no existe esta conversación en pantalla');
			console.log($('#'+conversacion).html());

			if($('#'+conversacion).html()===null || typeof $('#'+conversacion).html()==='undefined')
			{
				console.log('no existe el id de la conversacion')
				// CSRF protection
				$.ajaxSetup(
					{
						headers:
							{
								'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
							}
					});

				jQuery.ajax({
					type: "POST",
					async: false,
					dataType: "json",
					contentType: "application/x-www-form-urlencoded",
					url:"{{ route('dashboard.chats.load_conversation') }}",
					data:
						{
							"conversacion":conversacion,
							"video_chat":video_chat
						},
					beforeSend:function() { },
					success:function(response)
					{
						if(response.success===0)
							alertify.error(response.error);
						else
						{
							$('#tabla_chat').append(response.html_fila);

							if(parseInt($('#'+conversacion).attr('revertida'))===1)
							{
								var revertida=HtmlRevertida();
								$('#'+conversacion).find('#chat_mensajes').append(revertida);
							}

							if(response.segundos_quedan>0)
							{
								if(response.segundos_quedan)
								{
									IniciarCuentaAtrasUP(conversacion,response.segundos_quedan);
									duracion=0;
								}
								else
									QuitarCuentaAtrasUP(conversacion);
							}
							else
								QuitarCuentaAtrasUP(conversacion);


							$('#'+conversacion).find('#hablando').css('visibility','');
							$('#'+conversacion).find('#texto_hablando').html('¡Nuevo!');
							Parpadear($('#'+conversacion).find('#hablando'),1);

							$('#'+conversacion).find('#chat_mensajes').scrollTop($('#'+conversacion).find('#chat_mensajes')[0].scrollHeight);

							if(video_chat && response.token_video_chat!='')
								IniciarVideoLlamadaUP(conversacion,datos.video.sessionId,response.token_video_chat);

							baguetteBox.run('.galleryClient_'+conversacion);
							baguetteBox.run('.galleryPremium_'+conversacion);
							baguetteBox.run('.img-messages_'+conversacion);

							$('#'+conversacion).find('.panel-group')
								.on('hidden.bs.collapse', toggleIcon)
								.on('shown.bs.collapse', toggleIcon);
						}
					}
					,timeout:60000
					,error:function(objAJAXRequest,strError,response) { /*console.log(objAJAXRequest);*/ }
				});
			}
		}
		else
		{
			if(video_chat)
			{
				console.log('es video_chat');
				// CSRF protection
				$.ajaxSetup(
					{
						headers:
							{
								'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
							}
					});

				jQuery.ajax({
					async:true,
					type: "POST",
					dataType: "json",
					contentType: "application/x-www-form-urlencoded",
					url:"{{ route('dashboard.chats.videochat') }}",
					data:
						{
							"conversacion":conversacion,
						},
					success:function(response) { IniciarVideoLlamadaUP(conversacion,datos.video.sessionId,response.token); }
					,timeout:60000
					,error:function(objAJAXRequest,strError,response) { console.log(objAJAXRequest); }
				});
			}
			else
			{
				if($('#subscriber_'+conversacion).html()!=='')
					CerrarSesionVideo(conversacion);
			}
		}
	}

	function EnviarMensajeUP2(conversacion)
	{
		var foto=$('#'+conversacion).find('#up_foto').attr('src');
		foto = foto.replace('https://www.liruch.com', '');

		var nombre=$('#'+conversacion).data('nombre');
		var texto_mensaje=$('#'+conversacion).find('#texto_mensaje').val();
		var html=HtmlMensajePremiumEnviado(texto_mensaje,foto,nombre);
		var uic=$('#'+conversacion).find('#uic').val();
		var usuario=$('#'+conversacion).attr('usuario');
		var revertida=$('#'+conversacion).attr('revertida');

		texto_mensaje=texto_mensaje.trim();
		console.log('texto_mensaje='+texto_mensaje);

		if(texto_mensaje.length>0 && texto_mensaje!='')
		{
			$('#'+conversacion).find('#chat_mensajes').append(html);
			$('#'+conversacion).find('#chat_mensajes').scrollTop($('#'+conversacion).find('#chat_mensajes')[0].scrollHeight);
			$('#'+conversacion).find('#texto_mensaje').val('');


			// CSRF protection
			$.ajaxSetup(
				{
					headers:
						{
							'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
						}
				});

			jQuery.ajax({
				async:true,
				type: "POST",
				dataType: "json",
				contentType: "application/x-www-form-urlencoded",
				url:"{{ route('dashboard.chats.send_message') }}",
				data:
					{
						"conversacion":conversacion,
						"texto_mensaje":texto_mensaje,
						"usuario":usuario,
						"foto":foto,
						"nombre":nombre,
						"uic":uic,
						"revertida":revertida
					},
				beforeSend:function() { },
				success:function(response)
				{
					var ultimo=$('#'+conversacion).find('#chat_mensajes').find('.right').last();
					$('#'+conversacion).attr('revertida','0');
					console.log('Enviado');
					console.log(response);

					if(response.segundos_duracion!==null && response.segundos_duracion>0)
						IniciarCuentaAtrasUP(conversacion,response.segundos_duracion);
					else
						console.log('no_segundos_duracion');


					if(typeof response.mensaje.id !== 'undefined' && response.mensaje.id>0)
						$(ultimo).attr('id','mensaje_'+response.mensaje.id);

				}
				,timeout:60000
				,error:function(objAJAXRequest,strError,response) { console.log(objAJAXRequest); }
			});
		}
		else
			alertify.error("{{ trans('dashboard.chats.errors.introduce_message') }}");
	}

	function MarcarMensajeLeidoUP(mensaje,conversacion)
	{
		// CSRF protection
		$.ajaxSetup(
			{
				headers:
					{
						'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
					}
			});

		jQuery.ajax({
			async:true,
			type: "POST",
			dataType: "json",
			contentType: "application/x-www-form-urlencoded",
			url:"{{ route('dashboard.chats.mark_message_as_read') }}",
			data:
				{
					"mensaje":mensaje,
					"conversacion":conversacion
				},
			beforeSend:function() { },
			success:function(response) { }
			,timeout:60000
			,error:function(objAJAXRequest,strError,response) { }
		});
	}

	function GuardarNotaChatUP(conversacion)
	{
		var texto=$('#'+conversacion).find('#texto_nota').val();

		// CSRF protection
		$.ajaxSetup(
			{
				headers:
					{
						'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
					}
			});

		jQuery.ajax({
			async:true,
			type: "POST",
			dataType: "json",
			contentType: "application/x-www-form-urlencoded",
			url:"{{ route('dashboard.chats.create_note') }}",
			data:
				{
					"conversacion":conversacion,
					"texto":texto
				},
			beforeSend:function() { },
			success:function(response)
			{
				if(response.success>0)
				{
					$('#'+conversacion).find('#notas_conversacion ul').prepend('<li id="' + response.exito + '" class="notes">(' + getDateNow() + ') ' + $('#'+conversacion).find('#texto_nota').val().replace(/\n/g, '<br>\n')  + '</li>');
					$('#'+conversacion).find('#texto_nota').val("");
				}
				else
					alertify.error(response.error);
			}
			,timeout:60000
			,error:function(objAJAXRequest,strError,response) {/*console.log(objAJAXRequest);*/}
		});
	}


	function ObtenerChatRevertido()
	{
		if($('#tabla_chat').children().length<=5)
		{
			// CSRF protection
			$.ajaxSetup(
				{
					headers:
						{
							'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
						}
				});

			jQuery.ajax({
				async:true,
				type: "POST",
				dataType: "json",
				contentType: "application/x-www-form-urlencoded",
				url:"{{ route('dashboard.chats.get_reversed_chat') }}",
				data: { },
				beforeSend:function() { },
				success:function(response)
				{
					try
					{
						if(response.conversacion!==null && response.conversacion>0)
						{
							if(!$('#'+response.conversacion).html()!=='')
							{

								//////// ESTO ES LO QUE NO SABEMOS /////////
								var html=HtmlConversacion(response.conversacion,response.opciones.origen);
								$('#chat_conversaciones').prepend(html);

							}

							$('#'+response.conversacion).attr('revertida','1');

							//Notificar a la premium

							$('#audio-chat')[0].play();
							$('#'+response.conversacion).find('#hablando').css('visibility','');
							$('#'+response.conversacion).find('#texto_hablando').html('¡Chat revertido!');
							Parpadear($('#'+response.conversacion).find('#hablando'),1);
							console.log('sonido de obtener chat revertido:'+response.conversacion);
						}
					}catch(err) { console.log(err); }
				}
				,timeout:60000
				,error:function(objAJAXRequest,strError,response) { }
			});
		}
		else { console.log('tiene conversaciones'); }

		setTimeout(function(){ ObtenerChatRevertido(); }, 300000);
	}

	function ObtenerChatRevertidoDesconectado()
	{
		if($('#tabla_chat').children().length<=5)
		{
			// CSRF protection
			$.ajaxSetup(
				{
					headers:
						{
							'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
						}
				});

			jQuery.ajax({
				async:true,
				type: "POST",
				dataType: "json",
				contentType: "application/x-www-form-urlencoded",
				url:"{{ route('dashboard.chats.get_disconnected_reversed_chat') }}",
				data: { },
				beforeSend:function() { },
				success:function(response)
				{
					try
					{
						if(response.conversacion.id!==null && response.conversacion.id>0)
						{
							$('#'+response.conversacion.id).attr('revertida','1');

							//Notificar a la premium

							$('#audio-chat')[0].play();
							console.log('sonido de obtener chat revertido desconectado:'+response.conversacion.id);
							$('#'+response.conversacion).find('#hablando').css('visibility','');
							$('#'+response.conversacion).find('#texto_hablando').html('¡Chat revertido!');
							Parpadear($('#'+response.conversacion.id).find('#hablando'),1);
						}
					}catch(err) { console.log(err); }
				}
				,timeout:60000
				,error:function(objAJAXRequest,strError,response) { /*console.log(objAJAXRequest);*/ }
			});
		}
		else
			console.log('tiene conversaciones');

		setTimeout(function(){ ObtenerChatRevertidoDesconectado(); }, 300000);
	}

	function CerrarConversacionChat(conversacion,premium,cliente)
	{
		// CSRF protection
		$.ajaxSetup(
			{
				headers:
					{
						'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
					}
			});

		jQuery.ajax({
			async:true,
			type: "POST",
			dataType: "json",
			contentType: "application/x-www-form-urlencoded",
			url:"{{ route('dashboard.chats.close_chat_conversation') }}",
			data:
				{
					'id_conversacion':conversacion,
					'premium':premium,
					'cliente':cliente
				},
			beforeSend:function() { $('body').css('cursor', 'wait'); },
			success:function(response)
			{
				if(response.success===0)
					alertify.error(response.error);

				$('body').css('cursor', 'default');
			}
			,timeout:60000
			,error:function(objAJAXRequest,strError,response) { $('body').css('cursor', 'default'); }
		});

	}



	//FUNCIONES AUXILIARES
	function ActualizarConversacionPremium(conversacion,mensajes)
	{
		var usuario=$('#'+conversacion).attr('usuario');
		$.each( mensajes, function( key, value ) {
			var mensaje=value;
			if(typeof usuario !== 'undefined' && mensaje.origen!==usuario)
			{
				if($('#mensaje_'+mensaje.id).html()===null || typeof $('#mensaje_'+mensaje.id).html()==='undefined')
				{
					var html=HtmlMensajeRecibido(mensaje);
					$('#'+conversacion).find('#chat_mensajes').append(html);
					$('#'+conversacion).find('#chat_mensajes').scrollTop($('#'+conversacion).find('#chat_mensajes')[0].scrollHeight);

					MarcarMensajeLeidoUP(mensaje.id,conversacion);
					if($('#audio-chat').html()!==null)
						$('#audio-chat')[0].play();

					//Notificar a la premium

					Notificacion(conversacion,'¡Te está hablando!',mensaje);
					$('#'+conversacion).find('#hablando').css('visibility','');
					$('#'+conversacion).find('#texto_hablando').html('¡Te está hablando!');
					Parpadear($('#'+conversacion).find('#hablando'),1);
				}
			}
		});
	}

	function IniciarCuentaAtrasUP(conversacion,duracion)
	{
		if($('#'+conversacion).find("#CountDownTimer").length > 0)
			$('#'+conversacion).find("#CountDownTimer").TimeCircles().destroy();
		$('#'+conversacion).find("#cuenta_atras").html('<div id="CountDownTimer" data-timer="'+duracion+'" style="height:50px;margin-right:18px;"></div>');

		$('#'+conversacion).find("#CountDownTimer").TimeCircles({
			count_past_zero: false,
			circle_bg_color: "#4286F7",
			time: {
				Days: { show: false },
				Hours: { show: false },
				Minutes: { color: "#4286F7",text:"Minutos" },
				Seconds: { color: "#4286F7",text:"",show:false }
			}
		})

	}

	function QuitarCuentaAtrasUP(conversacion)
	{
		if($('#'+conversacion).find("#CountDownTimer").length > 0)
		{
			$('#'+conversacion).find("#CountDownTimer").TimeCircles().destroy();
			$('#'+conversacion).find("#CountDownTimer").css('display','none');
		}
	}

	function EliminarConversacionesNoActivasUP(conversaciones_activas)
	{
		$('.fila-chat').each(function( index ) {
			var result = jQuery.inArray($(this).attr("id"),conversaciones_activas);
			if(result===-1)
				$(this).remove();
		});
	}

	function HtmlRevertida()
	{
		var html='';
		html+='<div style="text-align: center;background-color: white;border: 1px solid #def1ea;padding: 7px;border-radius: 7px;font-weight: bold;color: red;" >';
		html+="Rescuerda que este chat lo has abierto tú.<br> Se supone que la que has visto el anuncio del chico y le has dado a chatear eres tú.<br>";
		html+='</div>';

		return html;
	}

	function QuitarHablando(conversacion)
	{
		conversacion_actual=conversacion;
		$('#'+conversacion).find('#hablando').css('visibility','hidden');
	}

	function Parpadear(elemento,n)
	{
		if (n===undefined)
			n=1;
		if (n>=10)
			elemento.fadeIn(500);
		else
		{
			elemento.fadeIn(500).delay(250).fadeOut(500, function ()
			{
				Parpadear(elemento,n+1);
			});
		}
	}

	function InfoChat(conversacion)
	{
		if($('#'+conversacion).find('#informacion_chat').hasClass('oculto'))
			$('#'+conversacion).find('#informacion_chat').removeClass('oculto');
		else
			$('#'+conversacion).find('#informacion_chat').addClass('oculto');
	}

	function Notificacion(conversacion,texto,mensaje)
	{
		var texto = '';
		if(conversacion!=conversacion_actual.toString())
		{
			texto = mensaje.nombre + " {!! trans('dashboard.chats.text.wrote') !!}"  + mensaje.texto;
			alertify.log(texto);
		}

	}

	function getDateNow()
	{
		var today = new Date();
		var dd = today.getDate();
		var mm = today.getMonth()+1; //January is 0!

		var yyyy = today.getFullYear();
		var time = getTime();
		if(dd<10){
			dd='0'+dd;
		}
		if(mm<10){
			mm='0'+mm;
		}
		return yyyy+'-'+mm+'-'+dd+' '+time;
	}

	function checkTime(i) {
		return (i < 10) ? "0" + i : i;
	}

	function getTime() {
		var today = new Date(),
			h = checkTime(today.getHours()),
			m = checkTime(today.getMinutes()),
			s = checkTime(today.getSeconds());
		return h + ":" + m + ":" + s;
	}

	function addZero(i)
	{
		if (i < 10)
			i = "0" + i;
		return i;
	}

	function HtmlMensajeRecibido(mensaje)
	{
		var f=new Date();
		var cad=cad=addZero(f.getHours())+":"+addZero(f.getMinutes());

		var foto=mensaje.foto;

		if(/sin-foto/.test(foto))
			foto='https://www.liruch.com'+foto;
		else
			foto= foto.replace("http:", "https:");

		var html='';
		html+='<div class="direct-chat-msg" id="mensaje_'+mensaje.id+'">';
		html+='<div class="direct-chat-info clearfix">';
		html+='<span class="direct-chat-name pull-left">' + mensaje.nombre + '</span>';
		html+='<span class="direct-chat-timestamp pull-right">' + cad + '</span>';
		html+='</div>';
		html+='<!-- /.direct-chat-info -->';
		html+='<img class="direct-chat-img" src="' + foto + '" alt="' + mensaje.nombre + '">';
		html+='<!-- /.direct-chat-img -->';
		html+='<div class="direct-chat-text"> ' + mensaje.texto + ' </div>';
		html+='<!-- /.direct-chat-text -->';
		html+='</div>';

		return html;
	}

	function ActualizarUltimaConexionAnimadora()
	{
		console.log('ActualizarUltimaConexionAnimadora');

		// CSRF protection
		$.ajaxSetup(
			{
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
			url: "{{ route('dashboard.chats.update_last_conn_entertainer') }}",
			data: {  },
			beforeSend:function() { },
			success:function(response)
			{
				if (response.exito == 0)
					console.log("Ha ocurrido un error al actualizar la última conexión de la animadora.");
				else
					console.log(response);
			}
			,timeout:60000
			,error:function(objAJAXRequest,strError) { console.log(strError); }
		});
	}

	//Función para crear la animación de cuando el usuario abre/cierra la parte de las notas
	function toggleIcon(e) {
		e.preventDefault();
		$(e.target)
			.parent()
			.find('i')
			.toggleClass('icon-plus3 icon-minus4');
	}

	function ExisteConversacionEnPantalla(conversacion)
	{
		var existe=false;
		$('.fila-chat').each(function( index ) {
			if($(this).attr('id')===conversacion)
				existe=true;
		});

		return existe;
	}

	function IntroEnviarUP2(e,conversacion)
	{
		var key = e.keyCode || e.which;
		if (key === 13)
			EnviarMensajeUP2(conversacion);

		return true;
	}

	function HtmlMensajePremiumEnviado(texto,foto,nombre)
	{
		var f=new Date();
		var cad=addZero(f.getHours())+":"+addZero(f.getMinutes());

		if(/sin-foto/.test(foto))
		{
			if(!(/static.liruch.com/.test(foto)))
				foto='https://static.liruch.com'+foto;
		}

		var html='';
		html+='<div class="direct-chat-msg right" id="mensaje_id">';
		html+='<div class="direct-chat-info clearfix">';
		html+='<span class="direct-chat-name pull-right">' + nombre + '</span>';
		html+='<span class="direct-chat-timestamp pull-left">' + cad + '</span>';
		html+='</div>';
		html+='<!-- /.direct-chat-info -->';
		html+='<img class="direct-chat-img" src="' + foto + '" alt="' + foto + '">';
		html+='<!-- /.direct-chat-img -->';
		html+='<div class="direct-chat-text"> ' + texto + ' </div>';
		html+='<!-- /.direct-chat-text -->';
		html+='</div>';

		return html;
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

		if (typeof oldIE === 'undefined' && Object.keys)
			hljs.initHighlighting();

		/*baguetteBox.run('.galleryClient');
		baguetteBox.run('.galleryPremium');
		baguetteBox.run('.img-messages');*/

		/*$('.panel-group')
			.on('hidden.bs.collapse', toggleIcon)
			.on('shown.bs.collapse', toggleIcon);*/


		$('.fila-chat').each(function( index ) {
			var conversacion=$(this).attr("id");
			$('#'+conversacion).find('#chat_mensajes').scrollTop($('#'+conversacion).find('#chat_mensajes')[0].scrollHeight);

		});

		if(!g_movil)
		{
			$(".open-panel").click(function() {
				$(".chat-left-aside").toggleClass("open-pnl");
				$(".open-panel i").toggleClass("ti-angle-left");
			});
		}



		var elegido=$('.widget-head').find('.active').find('a').attr('href');
		if(!chat_activo)
		{
			firebase_ConversacionesActivasUP({{ Auth::user()->code  }});
			setTimeout(function(){
				ObtenerChatRevertido();
			}, 300000);
			setTimeout(function(){
				ObtenerChatRevertidoDesconectado();
			}, 520000);
			ActualizarConexionPremium();
			ActualizarUltimaConexionAnimadora();
			setInterval(ActualizarUltimaConexionAnimadora,200000);
			chat_activo=1;
		}

	});
</script>