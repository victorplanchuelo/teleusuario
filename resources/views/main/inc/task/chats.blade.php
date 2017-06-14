@if(isset($success))
	@if($success != 1)
		<div class="alert alert-danger">
			<ul class="list-unstyled">
				<li class="text-center">{{ $strErr }}</li>
			</ul>
		</div>
	@endif
@endif

<!-- Row ends -->
<div class="row gutter">
	<div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
		<audio id="audio-chat">
			<source src="{{ asset('/audios/notificacion.mp3') }}" />
		</audio>

		<!--<h1>Chats disponibles</h1>-->
		<div class="container-fluid" style="" id="tabla_chat">

		</div>
	</div>
</div>