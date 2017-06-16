@if($success != 1)
	<div class="alert alert-danger">
		<ul class="list-unstyled">
			<li class="text-center">{{ $strErr }}</li>
		</ul>
	</div>
@endif

<!-- Row ends -->
<div class="row gutter">
	<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
		<div class="panel panel-chat panel-with-border-info">
			<div class="panel-heading">
				<div class="panel-title">
					<div class="row gutter">
						<div class="left" style="float: left;">
							<i class="icon-controller-record icon-red"></i>
							Nuevo chat
						</div>
						<div class="right" style="float: right;">
							<ul class="icons-nav">
								<li>
									<span class="badge badge-default badge-number-messages">23</span>
								</li>

								<li>
									<a href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="" data-original-title="Info">
										<i class="icon-info2 icon-blue"></i>
									</a>
								</li>
								<li>
									<a href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete">
										<i class="icon-cross icon-red"></i>
									</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<div class="panel-body">
				<!-- Conversations are loaded here -->
				<div class="direct-chat-messages">
					<!-- Message. Default to the left -->
					<div class="direct-chat-msg">
						<div class="direct-chat-info clearfix">
							<span class="direct-chat-name pull-left">Alexander Pierce</span>
							<span class="direct-chat-timestamp pull-right">23 Jan 2:00 pm</span>
						</div>
						<!-- /.direct-chat-info -->
						<img class="direct-chat-img" src="https://bootdey.com/img/Content/user_1.jpg" alt="Message User Image"><!-- /.direct-chat-img -->
						<div class="direct-chat-text">
							Is this template really for free? That's unbelievable!
						</div>
						<!-- /.direct-chat-text -->
					</div>
					<!-- /.direct-chat-msg -->
					<!-- Message to the right -->
					<div class="direct-chat-msg right">
						<div class="direct-chat-info clearfix">
							<span class="direct-chat-name pull-right">Sarah Bullock</span>
							<span class="direct-chat-timestamp pull-left">23 Jan 2:05 pm</span>
						</div>
						<!-- /.direct-chat-info -->
						<img class="direct-chat-img" src="https://bootdey.com/img/Content/user_2.jpg" alt="Message User Image"><!-- /.direct-chat-img -->
						<div class="direct-chat-text">
							You better believe it!
						</div>
						<!-- /.direct-chat-text -->
					</div>
					<!-- /.direct-chat-msg -->
					<!-- Message. Default to the left -->
					<div class="direct-chat-msg">
						<div class="direct-chat-info clearfix">
							<span class="direct-chat-name pull-left">Alexander Pierce</span>
							<span class="direct-chat-timestamp pull-right">23 Jan 2:00 pm</span>
						</div>
						<!-- /.direct-chat-info -->
						<img class="direct-chat-img" src="https://bootdey.com/img/Content/user_1.jpg" alt="Message User Image"><!-- /.direct-chat-img -->
						<div class="direct-chat-text">
							Is this template really for free? That's unbelievable!
						</div>
						<!-- /.direct-chat-text -->
					</div>
					<!-- /.direct-chat-msg -->

					<!-- Message to the right -->
					<div class="direct-chat-msg right">
						<div class="direct-chat-info clearfix">
							<span class="direct-chat-name pull-right">Sarah Bullock</span>
							<span class="direct-chat-timestamp pull-left">23 Jan 2:05 pm</span>
						</div>
						<!-- /.direct-chat-info -->
						<img class="direct-chat-img" src="https://bootdey.com/img/Content/user_2.jpg" alt="Message User Image"><!-- /.direct-chat-img -->
						<div class="direct-chat-text">
							You better believe it!
						</div>
						<!-- /.direct-chat-text -->
					</div>
					<!-- /.direct-chat-msg -->
					<!-- Message. Default to the left -->
					<div class="direct-chat-msg">
						<div class="direct-chat-info clearfix">
							<span class="direct-chat-name pull-left">Alexander Pierce</span>
							<span class="direct-chat-timestamp pull-right">23 Jan 2:00 pm</span>
						</div>
						<!-- /.direct-chat-info -->
						<img class="direct-chat-img" src="https://bootdey.com/img/Content/user_1.jpg" alt="Message User Image"><!-- /.direct-chat-img -->
						<div class="direct-chat-text">
							Is this template really for free? That's unbelievable!
						</div>
						<!-- /.direct-chat-text -->
					</div>
					<!-- /.direct-chat-msg -->

					<!-- Message to the right -->
					<div class="direct-chat-msg right">
						<div class="direct-chat-info clearfix">
							<span class="direct-chat-name pull-right">Sarah Bullock</span>
							<span class="direct-chat-timestamp pull-left">23 Jan 2:05 pm</span>
						</div>
						<!-- /.direct-chat-info -->
						<img class="direct-chat-img" src="https://bootdey.com/img/Content/user_2.jpg" alt="Message User Image"><!-- /.direct-chat-img -->
						<div class="direct-chat-text">
							You better believe it!
						</div>
						<!-- /.direct-chat-text -->
					</div>
					<!-- /.direct-chat-msg -->
					<!-- Message. Default to the left -->
					<div class="direct-chat-msg">
						<div class="direct-chat-info clearfix">
							<span class="direct-chat-name pull-left">Alexander Pierce</span>
							<span class="direct-chat-timestamp pull-right">23 Jan 2:00 pm</span>
						</div>
						<!-- /.direct-chat-info -->
						<img class="direct-chat-img" src="https://bootdey.com/img/Content/user_1.jpg" alt="Message User Image"><!-- /.direct-chat-img -->
						<div class="direct-chat-text">
							Is this template really for free? That's unbelievable!
						</div>
						<!-- /.direct-chat-text -->
					</div>
					<!-- /.direct-chat-msg -->

					<!-- Message to the right -->
					<div class="direct-chat-msg right">
						<div class="direct-chat-info clearfix">
							<span class="direct-chat-name pull-right">Sarah Bullock</span>
							<span class="direct-chat-timestamp pull-left">23 Jan 2:05 pm</span>
						</div>
						<!-- /.direct-chat-info -->
						<img class="direct-chat-img" src="https://bootdey.com/img/Content/user_2.jpg" alt="Message User Image"><!-- /.direct-chat-img -->
						<div class="direct-chat-text">
							You better believe it!
						</div>
						<!-- /.direct-chat-text -->
					</div>
					<!-- /.direct-chat-msg -->
					<!-- Message. Default to the left -->
					<div class="direct-chat-msg">
						<div class="direct-chat-info clearfix">
							<span class="direct-chat-name pull-left">Alexander Pierce</span>
							<span class="direct-chat-timestamp pull-right">23 Jan 2:00 pm</span>
						</div>
						<!-- /.direct-chat-info -->
						<img class="direct-chat-img" src="https://bootdey.com/img/Content/user_1.jpg" alt="Message User Image"><!-- /.direct-chat-img -->
						<div class="direct-chat-text">
							Is this template really for free? That's unbelievable!
						</div>
						<!-- /.direct-chat-text -->
					</div>
					<!-- /.direct-chat-msg -->

					<!-- Message to the right -->
					<div class="direct-chat-msg right">
						<div class="direct-chat-info clearfix">
							<span class="direct-chat-name pull-right">Sarah Bullock</span>
							<span class="direct-chat-timestamp pull-left">23 Jan 2:05 pm</span>
						</div>
						<!-- /.direct-chat-info -->
						<img class="direct-chat-img" src="https://bootdey.com/img/Content/user_2.jpg" alt="Message User Image"><!-- /.direct-chat-img -->
						<div class="direct-chat-text">
							You better believe it!
						</div>
						<!-- /.direct-chat-text -->
					</div>
					<!-- /.direct-chat-msg -->
				</div>
				<!--/.direct-chat-messages-->
			</div>
			<div class="panel-footer footer-white">
				<form action="#" method="post">
					<div class="input-group">
						<input type="text" name="message" placeholder="Type Message ..." class="form-control">
						<span class="input-group-btn">
                <button type="submit" class="btn btn-info btn-flat">Send</button>
              </span>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>