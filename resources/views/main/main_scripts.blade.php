<!-- Custom JS -->
<script src="{{ asset('js/custom.js') }}"></script>
<script src="{{ asset('js/loading-overlay.min.js') }}"></script>

<script type="text/javascript">

	$(document).ready(function() {

		$("#spinner").hide();

		if($('.panel-task-messages').length)
		{
			var d = $('.panel-task-messages');
			d.scrollTop(d.prop("scrollHeight"));
		}

		$('.init-tasks').click(function (e) {
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
				},
				complete: function(){
					$('#spinner').loadingOverlay('remove');
					$('#spinner').hide();
				}
			});

			e.stopPropagation();
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
