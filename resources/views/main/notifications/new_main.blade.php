<div class="dashboard-wrapper dashboard-wrapper-lg">
	<div class="container-fluid">

		@component('main.inc.top_bar')
			@slot('top_title', trans('dashboard.navbar.notifications.new'))
			@slot('top_message', ''))

			@slot('top_level', 4)
			@slot('top_score', 25)
		@endcomponent

		<div id="spinner" class="hidden"></div>
		<div id="new_notification">
			@include('main.notifications.inc.new')
		</div>
	</div>
</div>