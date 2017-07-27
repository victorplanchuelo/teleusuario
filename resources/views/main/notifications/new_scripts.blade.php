<!-- Custom JS -->
<script src="{{ asset('js/custom.js') }}"></script>

@if (session('status'))
	<script type="text/javascript">
		$(document).ready(function() {
			alertify.success('{{ session('status') }}');
		});
	</script>
@endif

@if (session('error'))
	<script type="text/javascript">
		$(document).ready(function() {
			alertify.error('{{ session('error') }}');
		});
	</script>
@endif

<script>
	$(document).ready(function() {
		$('#create-notification').click(function() {
			//LLAMADA AJAX A LA RUTA PARA GRABAR LA NOTIFICACION

			//1. Recuperamos los datos insertados
			var type, users, message, read;
			type = $( "#type" ).val();
			users = $( "#user" ).val() || [];
			// When using jQuery 3:
			// var multipleValues = $( "#multiple" ).val();
			message = $('#message').val();
			read=0;


			//2. Una vez con los datos almacenados, creamos el AJAX para enviarlos vía POST
			$.ajaxSetup({
				headers:
					{
						'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
					}
			});

			$.ajax({
				type: "POST",
				url: '{{ route('dashboard.notifications.store') }}',
				data: {
					type: type,
					user: users,
					message: message,
					read: read
				},
				dataType: "json",
				contentType: "application/x-www-form-urlencoded",
				beforeSend: function(){ $('body').css('cursor', 'wait'); },
				success: function(response)
				{
					$('body').css('cursor', 'default');

					users = response.users;

					if(response.success===0) {
						var errMsg = '<ul>';
						for (var err in response.error) {
							errMsg += '<li> - ' + response.error[err] + '</li>';
						}
						errMsg+='</ul>';

						alertify.error(errMsg);
					}
					else {
						//Se ha grabado bien. Lanzamos el push a firebase para que actualice el navbar
						$('.alert-success').text(response.message).removeClass('hidden');
						alertify.success(response.message);
					}
				},
				timeout:60000,
				fail: function(objAJAXRequest,strError,response){
					$('body').css('cursor', 'default');
					alertify.error(strError);
				}
			});
		});
	});
</script>