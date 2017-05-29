<!-- Custom JS -->
<script src="{{ asset('js/custom.js') }}"></script>
<script src="{{ asset('js/loading-overlay.min.js') }}"></script>

<script type="text/javascript">

	$(document).ready(function() {

		$("#spinner").hide();

		function toggleIcon(e) {
			$(e.target)
				.parent()
				.find('i')
				.toggleClass('icon-plus3 icon-minus4');
		}


		if($('.panel-task-messages').length)
		{
			var d = $('.panel-task-messages');
			d.scrollTop(d.prop("scrollHeight"));
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


					$('#create_new_note').on('submit',function(e){
						e.preventDefault();

						//AJAX que se llamará cuando la autónoma va a crear una nueva nota sobre la conversación
						action = "{{ route('dashboard.tasks.create_note') }}";

						// CSRF protection
						$.ajaxSetup(
						{
							headers:
								{
									'X-CSRF-Token': $('input[name="_token"]').val()
								}
						});

						var nueva_nota = new FormData();
						nueva_nota.append('texto',$('.text-note').val());
						nueva_nota.append('task', $(this).data('task'));
						nueva_nota.append('conversacion', $(this).data('conversation'));

						$.ajax({
							url: action,
							type: "POST",
							data: nueva_nota,
							processData: false,
							contentType: false,
							success: function (data) {
								if(data.success == 0)
								{
									$.each(data.error, function(index, msg){
										alertify.error(msg);
									});
									return false;
								}


								//Si no es 0 quiere decirse que se ha guardado la nota bien
								alertify.success('{{ trans('dashboard.task.message.create_note.success') }}');
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
