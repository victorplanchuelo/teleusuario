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
	<audio id="audio-chat">
		<source src="{{ asset('/audios/notificacion.mp3') }}" />
	</audio>

	<!--<h1>Chats disponibles</h1>-->
	<div id="tabla_chat">

	</div>
</div>