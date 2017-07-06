<!-- Row ends -->
<div class="row gutter">
	<div class="col-md-10 col-md-offset-1">
		<div class="panel panel-default">
			<div class="panel-body">
				@if (count($notifications))
					<p>{{ trans('dashboard.notifications.data.empty') }}</p>
				@else
					<!-- AQUI SE MOSTRARA EL DATATABLE DE LOS MENSAJES. VER EL TEMPLATE -->
				@endif
			</div>
		</div>
	</div>
</div>