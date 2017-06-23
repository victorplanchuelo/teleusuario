<!-- Custom JS -->
<script src="{{ asset('js/custom.js') }}"></script>
<script src="{{ asset('js/loading-overlay.min.js') }}"></script>

<!-- Gallery JS -->
<script src="{{ asset('js/gallery/baguetteBox.js') }}"></script>
<script src="{{ asset('js/gallery/plugins.js') }}"></script>


<script type="text/javascript">
	$(document).ready(function(){
		$('#category').change(function(e) {
			e.preventDefault();

			console.log(e);
			var category = e.target.value;

			$.get('{{ url('/dashboard/tickets/load-motives')  }}'+'?category='+category, function(data) {
				console.log(data);
				$('#motive').empty().append('<option value="">{{ trans("dashboard.tickets.create_ticket.form.select_motive") }}</option>');

				$.each(data, function(motive,index){
					$('#motive').append("<option value='"+ index + "'>"+ motive + "</option>");
				});
			});

		})
	})
</script>

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