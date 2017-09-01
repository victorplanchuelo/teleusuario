/**
 * Created by victorplanchuelo on 12/6/17.
 */
var firebase2, fire;


//////////// FUNCIONES QUE SE USAN
function firebase_ConversacionesActivasUP(usuario)
{
	var conversaciones_activasRef = fire.database().ref('chats/usuarios_premium_conversaciones/'+usuario);
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
	var mensajes_conversacionRef = fire.database().ref('chats/conversaciones/'+conversacion).orderByChild('leido').equalTo(0);
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



//////////////////FUNCIONES PARA LOS NOVIOS
function firebase_NoviosConectados()
{
	var usuarios_conectadosRef = fire.database().ref('chats/conexiones_usuarios');

	usuarios_conectadosRef.on('child_added', function(data) {
		$('.cliente[data-anuncio="'+data.val().anuncio+'"]').parent().parent().removeClass('desconectado').addClass('conectado');
	});
	usuarios_conectadosRef.on('child_removed', function(data) {
		$('.cliente[data-anuncio="'+data.val().anuncio+'"]').parent().parent().removeClass('conectado').addClass('desconectado');
	});
}




///////////////////////// FUNCIONES DEL MAIN DEL DASHBOARD
function firebase_EliminarNotificacion(strHtml, usuario, id_notificacion)
{
	var htmlNotificacionesRef = firebase2.database().ref('notifications/' + usuario + '/html');
	update_unread_notif_html(htmlNotificacionesRef, strHtml);

	var notificacionesUsuarioRef = firebase2.database().ref('notifications/'+ usuario + '/notifications/' + id_notificacion);
	notificacionesUsuarioRef.remove();
}

function firebase_ActualizarNotificaciones(usuario)
{
	var newItems = false;
	var notificacionesUsuarioRef = firebase2.database().ref('notifications/'+ usuario + '/notifications');
	var htmlNotificacionesRef = firebase2.database().ref('notifications/'+ usuario + '/html');

	notificacionesUsuarioRef.on('child_added', function(data) {
		if (!newItems) return;

		//Si hay 3 notificaciones, eliminamos la más antigua
		if ( $('.notification').length === 3 )
			$('.notification').last().remove();

		//Añadimos como primer <li> la nueva notificacion
		var notif = createNotif(data.val());
		$('.imp-notify>li:nth-child(1)').after(notif);

		//Aumentamos en 1 las notificaciones sin leer
		change_count_unread_notifications(0);

		//Actualizamos el nodo HTML en firebase
		update_unread_notif_html(htmlNotificacionesRef, $('.list-box:first-child').html());

		//Lanzamos la función para que el icono de notificaciones parpadee
		blink($('.list-box:first-child'));

	});
	notificacionesUsuarioRef.once('value', function(messages) {
		newItems = true;
	});




	/*****************************
	 * FUNCIÓN PARA CUANDO SE ELIMINA
	 * ****************************/
	notificacionesUsuarioRef.on('child_removed', function(data) {
		change_count_unread_notifications(1);

		htmlNotificacionesRef.on("value", function(snapshot) {
			var new_html;

			console.log(snapshot.key+": "+snapshot.val());
			new_html = snapshot.val();

			$('#header-actions').html(new_html);
			$('.dropdown-toggle').dropdown();
			dropdownMenu();

			blink($('.list-box:first-child'));
		});
	});
}

function nl2br (str, is_xhtml)
{
	var breakTag = (is_xhtml || typeof is_xhtml === 'undefined') ? '<br />' : '<br>';
	return (str + '').replace(/([^>\r\n]?)(\r\n|\n\r|\r|\n)/g, '$1' + breakTag + '$2');
}

function blink(item)
{
	if(item.hasClass('blink_icon'))
		item.removeClass('blink_icon');

	setTimeout(function(){
		item.addClass('blink_icon');
	}, 50);
}

function createNotif(data)
{
	var type, icon;
	switch(data.type) {
		case "1":
			type = 'text-danger';
			icon = 'icon-cross2';
			break;
		case "2":
			type = 'text-warning';
			icon = 'icon-info';
			break;
		case "4":
			type = 'text-success';
			icon = 'icon-trophy';
			break;
		case "3":
		default:
			type = 'text-info';
			icon = 'icon-comment-stroke';
			break;
	}

	return '<li class="notification" data-id="' + data.id + '"><div class="icon">' +
		'<i class="'+ type + ' ' + icon+'"></i>' +
		'</div>' +
		'<div class="details">' +
		'<strong>' + nl2br(data.message) + '</strong>' +
		'</div>' +
		'</li>';
}

function change_count_unread_notifications(operacion)
{
	var contador = parseInt($('.info-label').attr('data-count'));
	var strNotSinLeer = $('.dropdown-header').text();

	//Cambiamos el string de dentro

	$('.dropdown-header').text(strNotSinLeer.replace(contador, (contador+1)));

	console.log('contador_antiguo='+contador);
	if(operacion===0)
		contador++;
	else
		contador--;
	console.log('contador_nuevo='+contador);

	//Por último subimos el numero de notificaciones pendientes y hacemos que parpadee
	$('.info-label').attr('data-count', contador);
	$('.info-label').html(contador);
}

function update_unread_notif_html(ref, html)
{
	ref.set(html);
}
