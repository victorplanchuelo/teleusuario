<!-- Dashboard Wrapper Start -->
<div class="dashboard-wrapper dashboard-wrapper-lg">

	<!-- Container fluid Starts -->
	<div class="container-fluid">

		@component('main.inc.top_bar')
			@slot('top_title', trans('dashboard.title'))
			@slot('top_message', trans('dashboard.welcome_message'))

			@slot('top_level', 1)
			@slot('top_score', 25)
		@endcomponent

		<!-- Row starts -->
		<div class="row gutter">
			<!-- Panel de Tasks -->
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="panel">
					<div class="panel-heading">
						<h4>Tareas</h4>
					</div>
					<div class="panel-body">
						<ul class="task-list">
							<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
								<li class="task" data-task="message"><span>✔</span>Contestar 5 mensajes</li>
								<li class="task" data-task="wink"><span>✔</span>Envia 7 guiños</li>
							</div>
							<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
								<li class="task completed"><span>✔</span>Redesign Application</li>
								<li class="task"><span>✔</span>Hire Frontend Developer</li>
							</div>
							<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
								<li class="task completed"><span>✔</span>Good Food</li>
								<li class="task"><span>✔</span>Send Greetings</li>
							</div>
						</ul>

						<div class="col-lg-4 col-lg-offset-4 col-md-4 col-md-offset-4 col-sm-4 col-sm-offset-4 col-xs-12">
							<a class="btn btn-success init-tasks" href="#">Iniciar/Continuar tareas</a>
						</div>
					</div>
				</div>
			</div>
			<!-- Fin Panel de Tasks -->
		</div>

		<div id="spinner"></div>

		{{--@if(collect($message)->count()>0)
			@component('main.inc.task.message')
				@slot('message', $message)
			@endcomponent
		@endif --}}
	</div>
<!-- Container fluid ends -->

</div>
<!-- Dashboard Wrapper End -->


<?php
/*
PARA LA PAGINACION VER
https://mattstauffer.co/blog/customizing-pagination-templates-in-laravel-5-3
https://laravel.com/docs/5.4/pagination
*/

/*
SOLUCION PARA MULTIPLES PAGINATORS EN UNA MISMA VISTA

This is an easy solution I've found on Laravel 4.

Controller

Change the page name before you make the paginator:





Paginator::setPageName('page_a');
$collection_A = ModelA::paginate(10);

Paginator::setPageName('page_b');
$collection_B = ModelB::paginate(10);




View

Do the same: change the page name before you print the links





Paginator::setPageName('page_a');
$collection_A->links();

Paginator::setPageName('page_b');
$collection_B->links();




If you don't want to lose any page state while you navigate to another page, append to the links the current page from all collections:




Paginator::setPageName('page_a');
$collection_A->appends('page_b', Input::get('page_b',1))->links();

Paginator::setPageName('page_b');
$collection_B->appends('page_a', Input::get('page_a',1))->links();
*/

?>