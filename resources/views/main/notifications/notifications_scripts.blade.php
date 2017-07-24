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


<script type="text/javascript">
	$(document).ready(function() {
		$('.notification').click(function(e) {
			e.preventDefault();

			var noti = $(this).find('.btn');

			$.ajax({
				type: "GET",
				dataType: "json",
				url:"{{ route('dashboard.notifications.mark_as_read') }}",
				data:{
					'notification':$(this).data('id')
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
						//SE HA MARCADO COMO LEIDO CORRECTAMENTE

						// SE CAMBIA EL COLOR AL OJO Y SE MODIFICA EL HEADER
						// PARA RESTARLE UNO AL NUMERO DE NOTIFICACIONES SIN LEER
						noti.removeClass('btn-danger').addClass('btn-success');
						$('#header-actions').html(response.html);
						$('.dropdown-toggle').dropdown();
						dropdownMenu();

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
		});
	});
</script>