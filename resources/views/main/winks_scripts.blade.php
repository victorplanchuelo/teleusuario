<!-- Custom JS -->
<script src="{{ asset('js/custom.js') }}"></script>
<script src="{{ asset('js/loading-overlay.min.js') }}"></script>

<!-- Gallery JS -->
<script src="{{ asset('js/gallery/baguetteBox.js') }}"></script>
<script src="{{ asset('js/gallery/plugins.js') }}"></script>




<script type="text/javascript">

	//Función para añadir el mensaje en la pantalla

	 //Hace un scroll hasta el último mensaje enviado
	 /*function MostrarUltimoMensaje()
	 {
		 if($('.panel-task-messages').length)
		 {
			 var d = $('.panel-task-messages');
			 d.scrollTop(d.prop("scrollHeight"));
		 }
	 }

	
	function AnyadirGuinyo(fecha, texto)
	{
		$('ul.chats').append('<li class="out"><img class="avatar" src="' + $(".img-premium").attr("src") + '" /><div class="message"><p class="date"><strong>' + $("#name-msg").data('name') + ' - ' + fecha + '</strong></p><p class="inffo">' + texto.replace(/\n/g, "<br>\n") + '</p></li>');
	}



	//Función para crear la animación de cuando el usuario abre/cierra la parte de las notas
	function toggleIcon(e) {
		$(e.target)
			.parent()
			.find('i')
			.toggleClass('icon-plus3 icon-minus4');
	}*/

	$(document).ready(function() {

		//$('.panel-group').on('hidden.bs.collapse', toggleIcon).on('shown.bs.collapse', toggleIcon);

		if(typeof oldIE === 'undefined' && Object.keys)
			hljs.initHighlighting();
		baguetteBox.run('.galleryClient');
		baguetteBox.run('.galleryPremium');
		baguetteBox.run('.img-messages');

		//MostrarUltimoMensaje();

		/*
		$('#send-message').on('submit',function(e){
			e.preventDefault();

			//Se envía el mensaje escrito
			var txtMensaje = $('.new-message').val();
			var token_seguridad = $('input[name="_token"]').val();

			//AJAX que se llamará cuando la autónoma va a crear una nueva nota sobre la conversación
			action = "{{ route('dashboard.message.send_message') }}";

			var formData = {
				texto: txtMensaje,
				_token: token_seguridad,
			};

			// CSRF protection
			$.ajaxSetup(
			{
				headers:
					{
						'X-CSRF-Token': token_seguridad
					}
			});

			$.ajax({
				url: action,
				type: "POST",
				data: formData,
				success: function (data) {
					if(data.success === 0)
					{
						$.each(data.error, function(index, msg){
							alertify.error(msg);
						});
						return false;
					}

					//Si no es 0 quiere decirse que se ha guardado la nota bien
					alertify.success('{{ trans('dashboard.task.message.create_note.success') }}');

					//Habría que quitar las 3 ultimas lineas de código, ya que al enviar el mensaje bien
					// debería cerrar el div de los datos, lanzar el spinner y mostrar los datos de otro mensaje
					$('#message').hide(1000, function() {
						$(this).html('');
						$('#spinner').show().loadingOverlay();

						var formData = {
							texto: txtMensaje,
							_token: token_seguridad
						};

						// CSRF protection
						$.ajaxSetup(
							{
								headers:
									{
										'X-CSRF-Token': token_seguridad
									}
							});

						$.ajax({
							url: '{{ route('dashboard.message.load_new_message') }}',
							type: "GET",
							data: formData,
							success: function (data) {
								$('#message').html(data).show(1000);
							},
							complete: function(data) {
								$('#spinner').loadingOverlay('remove').hide();
							}
						});
					});


				},
				error: function(response) {
					alertify.error(response.responseText);
				}
			});

			e.stopPropagation();

		});

		$('#create_new_note').on('submit',function(e){
			e.preventDefault();

			var txtNota = $('.text-note').val();
			var token_seguridad = $('input[name="_token"]').val();

			//AJAX que se llamará cuando la autónoma va a crear una nueva nota sobre la conversación
			action = "{{ route('dashboard.message.create_note') }}";

			var formData = {
				texto: txtNota,
				conversacion_chat: $(this).data('conversation'),
				_token: token_seguridad,
			};

			// CSRF protection
			$.ajaxSetup(
				{
					headers:
						{
							'X-CSRF-Token': token_seguridad
						}
				});

			$.ajax({
				url: action,
				type: "POST",
				data: formData,
				success: function (data) {
					if(data.success === 0)
					{
						$.each(data.error, function(index, msg){
							alertify.error(msg);
						});
						return false;
					}

					//Si no es 0 quiere decirse que se ha guardado la nota bien
					alertify.success('{{ trans('dashboard.task.message.create_note.success') }}');

					$('.text-note').val('');

					//Añadimos la nueva nota en el apartado de las notas
					$('#collapseTwo .panel-body ul').prepend('<li>(' + data.strDate + ') ' + txtNota.replace(/\n/g, '<br>\n')  + '</li>');
				},
				error: function(response) {
					alertify.error(response.responseText);
				}
			});

			e.stopPropagation();

		});
		*/
	});
</script>




<script type="text/javascript">
</script>