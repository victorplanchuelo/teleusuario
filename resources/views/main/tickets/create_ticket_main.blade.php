<div class="dashboard-wrapper dashboard-wrapper-lg">
	<div class="container-fluid">

		@component('main.inc.top_bar')
			@slot('top_title', trans('dashboard.tickets.create_ticket.title'))
			@slot('top_message', ''))

			@slot('top_level', 4)
			@slot('top_score', 25)
		@endcomponent

		<div id="spinner" class="hidden"></div>
		<div id="create_ticket">
			@include('main.tickets.inc.create_ticket')
		</div>
	</div>
</div>