@if (session('success'))
	<script type="javascript">
		$(document).ready(function() {
			alertify.success('{{ trans('dashboard.change_password.message.success') }}');
		});
	</script>
@endif