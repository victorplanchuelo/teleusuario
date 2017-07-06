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