<!-- Custom JS -->
<script src="{{ asset('js/custom.js') }}"></script>
<script src="{{ asset('js/loading-overlay.min.js') }}"></script>

<script src="https://www.gstatic.com/firebasejs/4.1.5/firebase.js"></script>
<script type="text/javascript" src="{{ asset('/js/firebase.js') }}"></script>

<!-- Gallery JS -->
<script src="{{ asset('js/gallery/baguetteBox.js') }}"></script>
<script src="{{ asset('js/gallery/plugins.js') }}"></script>

<script type="text/javascript">

	function AnyadirMensaje(fecha, texto)
	{
		$('ul.chats').append('<li class="out"><img class="avatar" src="' + $(".img-premium").attr("src") + '" /><div class="message"><p class="date"><strong>' + $("#name-msg").data('name') + ' - ' + fecha + '</strong></p><p class="inffo">' + texto.replace(/\n/g, "<br>\n") + '</p></li>');
	}

	function MostrarUltimoMensaje()
	{
		if($('.panel-task-messages').length)
		{
			var d = $('.panel-task-messages');
			d.scrollTop(d.prop("scrollHeight"));
		}
	}

	$(document).ready(function() {

		/*$("#spinner").hide();

		function toggleIcon(e) {
			$(e.target)
				.parent()
				.find('i')
				.toggleClass('icon-plus3 icon-minus4');
		}

		$('.init-tasks').click(function (e) {

			e.stopPropagation();
			e.preventDefault();

			$(this).hide();
			//Si hemos iniciado las tareas por primera vez (guardar tarea en session?)
				// Cargamos la primera tarea sin realizar y lanzamos en AJAX
			//Si ya habíamos comenzado la tarea, recuperamos la tarea y lanzamos el ajax para continuar con el mensaje

			var task;
			var action;


			$('.task').each(function(i) {
				if(!$(this).is('.complete'))
				{
					//Coge la primera tarea
					task = $(this).data('task');
					return false;
				}
			});

			action= "{{ route('dashboard.tasks') }}";

			$('#spinner').show();

			$('#spinner').loadingOverlay();

			//Una vez tenemos los datos que necesitamos, debemos lanzar el AJAX
			$.ajax({
				url: action,
				type: "GET",
				data: {task: task},
				success: function(data){
					$(".container-fluid").append(data);

					$('.panel-group').on('hidden.bs.collapse', toggleIcon);
					$('.panel-group').on('shown.bs.collapse', toggleIcon);

					if(typeof oldIE === 'undefined' && Object.keys)
						hljs.initHighlighting();
					baguetteBox.run('.galleryClient');
					baguetteBox.run('.galleryPremium', {
						animation: 'fadeIn',
					});
					baguetteBox.run('.img-messages');

					MostrarUltimoMensaje();

					$('#send-message').on('submit',function(e){
						e.preventDefault();

						//Se envía el mensaje escrito
						var txtMensaje = $('.new-message').val();
						var token_seguridad = $('input[name="_token"]').val();

						//AJAX que se llamará cuando la autónoma va a crear una nueva nota sobre la conversación
						action = "{{ route('dashboard.tasks.send_message') }}";

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

								$('.new-message').val('');

								//Añadimos la nueva nota en el apartado de las notas
								AnyadirMensaje(data.strDate, txtMensaje);

								MostrarUltimoMensaje();

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
						action = "{{ route('dashboard.tasks.create_note') }}";

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
				},
				complete: function(){
					$('#spinner').loadingOverlay('remove');
					$('#spinner').hide();
				}
			});
		});
		*/

	});

	/*PARA CUANDO SE AÑADA EL MENSAJE ESCRITO POR LA AUTONOMA

	 window.setInterval(function() {
	 var elem = document.getElementById('data');
	 elem.scrollTop = elem.scrollHeight;
	 }, 5000);

	* */

	/*window.onload=function(){
		setTimeout(function(){
			taskOdometer.innerHTML = 147;
		}, 500);

		setTimeout(function(){
			taskOdometer2.innerHTML = 147;
		}, 500);

	}*/
</script>
