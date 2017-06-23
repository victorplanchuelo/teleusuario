/**
 * Created by victorplanchuelo on 12/6/17.
 */



//////////// FUNCIONES QUE SE USAN
function firebase_ConversacionesActivasUP(usuario)
{
	var conversaciones_activasRef = firebase.database().ref('chats/usuarios_premium_conversaciones/'+usuario);
	conversaciones_activasRef.on("value", function(snapshot) {
		console.log('snapshot');
		console.log(snapshot.val());
		var conversaciones_activas=[];
		if(snapshot.val()!==null)
		{
			var conversaciones=snapshot.val();
			$.each( conversaciones, function( key, value ) {
				HtmlActualizarConversacionesUsuarioPremium(key,value);
				firebase_ActualizarConversacion(key);
				conversaciones_activas.push(key);

			});

			EliminarConversacionesNoActivasUP(conversaciones_activas);
		}
		else
			$('#tabla_chat').html('');
	});
}

function firebase_ActualizarConversacion(conversacion)
{
	//orderByChild('conversacion').equalTo(conversacion)
	var mensajes_conversacionRef = firebase.database().ref('chats/conversaciones/'+conversacion).orderByChild('leido').equalTo(0);
	mensajes_conversacionRef.off();
	mensajes_conversacionRef.on("value", function(snapshot) {
		console.log(snapshot.val());
		if(snapshot.val()!==null)
		{
			console.log("Actualiza");
			ActualizarConversacionPremium(conversacion,snapshot.val());
		}
	});
}

///////////////// FIN FUNCIONES QUE SE USAN
