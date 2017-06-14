<div class="dashboard-wrapper dashboard-wrapper-lg">
	<div class="container-fluid">

		@component('main.inc.top_bar')
			@slot('top_title', trans('dashboard.chats.title'))
			@slot('top_message', ''))

			@slot('top_level', 4)
			@slot('top_score', 25)
		@endcomponent

		<div id="chats">
			@include('main.inc.task.chats')
		</div>
	</div>
</div>