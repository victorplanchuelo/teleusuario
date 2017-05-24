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
								<li class="task">
									<a href="javascript:void(0)">
										<span class="tra-icon">
											<i class="icon-shield3 text-danger"></i>
										</span>
										<span class="tra-type">Month Salary</span>
									</a>
								</li>
								<li class="task">
									<a href="javascript:void(0)">
										<span class="tra-icon">
											<i class="icon-shopping-cart text-info"></i>
										</span>
										<span class="tra-type">Month Salary</span>
									</a>
								</li>
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
					</div>
				</div>
			</div>
			<!-- Fin Panel de Tasks -->
		</div>
		<!-- Row ends -->
		<div class="row gutter">
			<div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
				<div class="panel panel-task-info">
					<div class="panel-heading">
						<h4>Información de la tarea</h4>
					</div>
					<div class="panel-body">
						<div class="users-wrapper red">
							<div class="users-info clearfix">
								<div class="users-avatar">
									<img src="img/thumbs/user3.png" class="img-responsive" alt="Arise Admin">
								</div>
								<div class="users-detail">
									<h5>Fraser Davidson</h5>
									<p>UX Designer</p>
								</div>
							</div>
							<ul class="users-footer clearfix">
								<li>
									<p class="light">Location</p>
									<p>Canada</p>
								</li>
								<li>
									<p class="light">Contact</p>
									<p>767336672</p>
								</li>
								<li>
									<a href="#" class="add-btn added">
										<i class="icon-check"></i>
									</a>
								</li>
							</ul>
						</div>
						<div class="users-wrapper red">
							<div class="users-info clearfix">
								<div class="users-avatar">
									<img src="img/thumbs/user3.png" class="img-responsive" alt="Arise Admin">
								</div>
								<div class="users-detail">
									<h5>Fraser Davidson</h5>
									<p>UX Designer</p>
								</div>
							</div>
							<ul class="users-footer clearfix">
								<li>
									<p class="light">Location</p>
									<p>Canada</p>
								</li>
								<li>
									<p class="light">Contact</p>
									<p>767336672</p>
								</li>
								<li>
									<a href="#" class="add-btn added">
										<i class="icon-check"></i>
									</a>
								</li>
							</ul>
						</div>
						<fieldset>
							<legend>Notas de la conversación</legend>
							<form method="post" action="#">
								{{ csrf_field() }}
								<textarea class="form-control" rows="3"></textarea>
								<button type="submit" class="btn btn-info">Enviar</button>
							</form>
						</fieldset>
					</div>
				</div>
			</div>
			<div class="col-lg-8 col-md-6 col-sm-6 col-xs-12">
				<div class="panel">
					<div class="panel-heading">
						<h4>Este para la pag. mensajes</h4>
					</div>
					<div class="panel-body panel-task-messages">
						<ul class="chats">
							<li class="in">
								<img class="avatar" alt="" src="img/thumbs/user7.png">
								<div class="message">
									<p class="date">Simmy Willams - April 21st, 2016 12 pm</p>
									<p class="inffo">Raw denim heard of them tofu master cleanse.</p>
									<div class="progress-stats clearfix">
										<i class="icon-camera5 pull-left"></i>
									</div>
								</div>
							</li>
							<li class="out">
								<img class="avatar" alt="" src="img/thumbs/user5.png">
								<div class="message">
									<p class="date">Peter on April 14th, 2016 09:32</p>
									<p class="inffo">Next level veard stumptown, banh lomo thundercats.</p>
								</div>
							</li>
							<li class="in">
								<img class="avatar" alt="" src="img/thumbs/user4.png">
								<div class="message">
									<p class="date">Johnson on Apr 28th, 2016 09:47</p>
									<p class="inffo">Beard stumptown scenester farm-to-table denim coffee viral.</p>
								</div>
							</li>
							<li class="out">
								<img class="avatar" alt="" src="img/thumbs/user5.png">
								<div class="message">
									<p class="date">Peter on April 14th, 2016 09:32</p>
									<p class="inffo">Next level veard stumptown, banh lomo thundercats.</p>
								</div>
							</li>
							<li class="in">
								<img class="avatar" alt="" src="img/thumbs/user4.png">
								<div class="message">
									<p class="date">Johnson on Apr 28th, 2016 09:47</p>
									<p class="inffo">Beard stumptown scenester farm-to-table denim coffee viral.</p>
								</div>
							</li>
							<li class="out">
								<img class="avatar" alt="" src="img/thumbs/user5.png">
								<div class="message">
									<p class="date">Peter on April 14th, 2016 09:32</p>
									<p class="inffo">Next level veard stumptown, banh lomo thundercats.</p>
								</div>
							</li>
							<li class="in">
								<img class="avatar" alt="" src="img/thumbs/user4.png">
								<div class="message">
									<p class="date">Johnson on Apr 28th, 2016 09:47</p>
									<p class="inffo">Beard stumptown scenester farm-to-table denim coffee viral.</p>
								</div>
							</li>
							<li class="out">
								<img class="avatar" alt="" src="img/thumbs/user5.png">
								<div class="message">
									<p class="date">Peter on April 14th, 2016 09:32</p>
									<p class="inffo">Next level veard stumptown, banh lomo thundercats.</p>
								</div>
							</li>
							<li class="in">
								<img class="avatar" alt="" src="img/thumbs/user4.png">
								<div class="message">
									<p class="date">Johnson on Apr 28th, 2016 09:47</p>
									<p class="inffo">Beard stumptown scenester farm-to-table denim coffee viral.</p>
								</div>
							</li>
							<li class="out">
								<img class="avatar" alt="" src="img/thumbs/user5.png">
								<div class="message">
									<p class="date">Peter on April 14th, 2016 09:32</p>
									<p class="inffo">Next level veard stumptown, banh lomo thundercats.</p>
								</div>
							</li>
							<li class="in">
								<img class="avatar" alt="" src="img/thumbs/user4.png">
								<div class="message">
									<p class="date">Johnson on Apr 28th, 2016 09:47</p>
									<p class="inffo">Beard stumptown scenester farm-to-table denim coffee viral.</p>
								</div>
							</li>
							<li class="out">
								<img class="avatar" alt="" src="img/thumbs/user5.png">
								<div class="message">
									<p class="date">Peter on April 14th, 2016 09:32</p>
									<p class="inffo">Next level veard stumptown, banh lomo thundercats.</p>
								</div>
							</li>
							<li class="in">
								<img class="avatar" alt="" src="img/thumbs/user4.png">
								<div class="message">
									<p class="date">Johnson on Apr 28th, 2016 09:47</p>
									<p class="inffo">Beard stumptown scenester farm-to-table denim coffee viral.</p>
								</div>
							</li>
						</ul>
					</div>
					<form method="post" action="#">
						<div class="row gutter">
							{{ csrf_field() }}
							<textarea class="form-control" rows="3"></textarea>
							<button type="submit" class="btn btn-info">Enviar</button>
						</div>
					</form>
				</div>
			</div>
		</div>
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
 * PARA USAR AJAX EN EL LOGIN/REGISTRO
 * http://code4fun.io/post/laravel-ajax-register-and-login
 *
 * PARA USAR AJAX EN LARAVEL
 * https://styde.net/ajax-y-laravel-usando-jquery/
 * https://github.com/AmirMustafa/AJAX-Form-Submit-Laravel-5.4
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