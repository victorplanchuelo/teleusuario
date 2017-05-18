<!-- Dashboard Wrapper Start -->
<div class="dashboard-wrapper dashboard-wrapper-lg">
	<!-- Container fluid Starts -->
	<div class="container-fluid">
		@component('main.inc.top_bar')
			@slot('top_title', trans('dashboard.ranking.title'))
			@slot('top_message', ''))

			@slot('top_level', 2)
			@slot('top_score', 25)
		@endcomponent
		<div class="row gutter">
			<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
				<div class="card-wrapper gold">
					<div class="card clearfix">
						<span class="card-type">1st</span>
						<img src="{{ asset('/img/thumbs/user3.png') }}" class="img-responsive card-avatar" alt="Arise Admin" />
						<p>Victor Erixon</p>
						<h5>Tech Chimps Inc</h5>
						<p>I am <strong>#Founder</strong> and <strong>#Designer</strong> from North. <strong>#Icecream</strong> lover.</p>
					</div>
					<ul class="card-actions clearfix">
						<li>
							<a href="#" class="action-btn">
								<i class="icon-facebook-with-circle"></i>
							</a>
						</li>
						<li>
							<a href="#" class="action-btn">
								<i class="icon-twitter-with-circle"></i>
							</a>
						</li>
					</ul>
				</div>
			</div>
			<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
				<div class="card-wrapper silver">
					<div class="card clearfix">
						<span class="card-type">2nd</span>
						<img src="{{ asset('/img/thumbs/user1.png') }}" class="img-responsive card-avatar" alt="Arise Admin" />
						<p>Victor Erixon</p>
						<h5>Tech Chimps Inc</h5>
						<p>I am <strong>#Founder</strong> and <strong>#Designer</strong> from North. <strong>#Icecream</strong> lover.</p>
					</div>
					<ul class="card-actions clearfix">
						<li>
							<a href="#" class="action-btn">
								<i class="icon-facebook-with-circle"></i>
							</a>
						</li>
						<li>
							<a href="#" class="action-btn">
								<i class="icon-twitter-with-circle"></i>
							</a>
						</li>
					</ul>
				</div>
			</div>
			<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
				<div class="card-wrapper bronze">
					<div class="card clearfix">
						<span class="card-type">3rd</span>
						<img src="{{ asset('/img/thumbs/user13.png') }}" class="img-responsive card-avatar" alt="Arise Admin" />
						<p>Victor Erixon</p>
						<h5>Tech Chimps Inc</h5>
						<p>I am <strong>#Founder</strong> and <strong>#Designer</strong> from North. <strong>#Icecream</strong> lover.</p>
					</div>
					<ul class="card-actions clearfix">
						<li>
							<a href="#" class="action-btn">
								<i class="icon-facebook-with-circle"></i>
							</a>
						</li>
						<li>
							<a href="#" class="action-btn">
								<i class="icon-twitter-with-circle"></i>
							</a>
						</li>
					</ul>
				</div>
			</div>
			<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
				<div class="card-wrapper red">
					<div class="card clearfix">
						<span class="card-type">4th</span>
						<img src="{{ asset('/img/thumbs/user5.png') }}" class="img-responsive card-avatar" alt="Arise Admin" />
						<p>Victor Erixon</p>
						<h5>Tech Chimps Inc</h5>
						<p>I am <strong>#Founder</strong> and <strong>#Designer</strong> from North. <strong>#Icecream</strong> lover.</p>
					</div>
					<ul class="card-actions clearfix">
						<li>
							<a href="#" class="action-btn">
								<i class="icon-facebook-with-circle"></i>
							</a>
						</li>
						<li>
							<a href="#" class="action-btn">
								<i class="icon-twitter-with-circle"></i>
							</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>