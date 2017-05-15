<!-- Custom JS -->
<script src="{{ asset('js/custom.js') }}"></script>

@if (session('success'))
<script type="text/javascript">
	$(document).ready(function() {
			alertify.success('{{ trans('dashboard.change_password.message.success') }}');
	});
</script>
@endif

@if (session('error'))
	<script type="text/javascript">
		$(document).ready(function() {
			alertify.error('{{ trans('dashboard.change_password.message.error') }}');
		});
	</script>
@endif
