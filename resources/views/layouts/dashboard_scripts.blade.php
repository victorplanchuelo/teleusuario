<script src="https://www.gstatic.com/firebasejs/4.1.5/firebase.js"></script>
<script type="text/javascript" src="{{ asset('/js/firebase.js') }}"></script>


<script type="text/javascript">

	$(document).ready(function() {
		if(firebase2==null)
		{
			// Initialize Firebase
			var config = {
				apiKey: "AIzaSyBECU9XRs56GqGpg8IHdY2NgWD3GEGQJmQ",
				authDomain: "teleusuario-1a83e.firebaseapp.com",
				databaseURL: "https://teleusuario-1a83e.firebaseio.com",
				projectId: "teleusuario-1a83e",
				storageBucket: "teleusuario-1a83e.appspot.com",
				messagingSenderId: "994279558096"
			};
			firebase2 = firebase.initializeApp(config, 'notifications');
		}


		//Lanzamos la función a firebase para estar pendiente de las notificaciones, para hacerlas real-time
		firebase_ActualizarNotificaciones(<?php echo e(Auth::user()->code); ?>);
	});
</script>