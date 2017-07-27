<script src="https://www.gstatic.com/firebasejs/4.1.5/firebase.js"></script>
<script type="text/javascript" src="{{ asset('/js/firebase.js') }}"></script>


<script type="text/javascript">
	$(document).ready(function() {
		// Initialize Firebase
		var config = {
			apiKey: "AIzaSyBzbqWeE3jKUmxKcXGkT4am3kPswgrO2AY",
			authDomain: "notifications-9c63f.firebaseapp.com",
			databaseURL: "https://notifications-9c63f.firebaseio.com",
			projectId: "notifications-9c63f",
			storageBucket: "notifications-9c63f.appspot.com",
			messagingSenderId: "1067087567114"
		};
		firebase.initializeApp(config);

		//Lanzamos la función a firebase para estar pendiente de las notificaciones, para hacerlas real-time
		firebase_ActualizarNotificaciones({{ Auth::user()->code  }});
	});
</script>