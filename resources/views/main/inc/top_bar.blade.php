<!-- Top Bar Starts -->
<div class="top-bar clearfix">
	<div class="row gutter">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="page-title">
				<h3>{{ $top_title }}</h3>
				@if($top_message!='')
					<p>{{ $top_message }}</p>
				@endif
			</div>
		</div>
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<ul class="right-stats" id="mini-nav-right">
				<li>
					<a href="javascript:void(0)" class="btn btn-danger"><span>{{ $top_level }}</span>{{ trans('dashboard.level') }}</a>
				</li>
				<li>
					<a href="#" class="btn btn-success">
						<span>{{ $top_score }}</span>{{ trans('dashboard.scores') }}</a>
				</li>
				<li>
					<a href="javascript:void(0)" class="btn btn-info"><i class="icon-download6"></i> Export</a>
				</li>
			</ul>
		</div>
	</div>
</div>
<!-- Top Bar Ends -->