<div class="dashboard-wrapper dashboard-wrapper-lg">
	<div class="container-fluid">

		@component('main.inc.top_bar')
			@slot('top_title', trans('dashboard.wink.title'))
			@slot('top_message', ''))

			@slot('top_level', 4)
			@slot('top_score', 25)
		@endcomponent

		<div id="spinner" class="hidden"></div>
		<div id="wink">
			@include('main.inc.task.wink')
		</div>
	</div>
</div>