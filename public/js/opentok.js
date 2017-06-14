/**
 * Created by victorplanchuelo on 12/6/17.
 */
var apiKey='45754362';

function IniciarVideoLlamadaUP(conversacion,sessionId,token)
{
	console.log(sessionId);

	if(typeof $('#'+conversacion).attr('video_sessionId') === 'undefined')
	{
		console.log('012');
		initializeSession(conversacion,sessionId,token);
	}
	else
	{
		console.log('011');
		session = OT.initSession(apiKey, sessionId);
		session.connect(token);
	}
	$('#'+conversacion).find('#video_chat').css('display','');
	$('#'+conversacion).find('#subscriber').children().first().css('margin','0 auto');
	$('#'+conversacion).attr('video_sessionId',sessionId);
}

function initializeSession(conversacion,sessionId,token)
{
	var session = OT.initSession(apiKey, sessionId);
	// Subscribe to a newly created stream
	session.on('streamCreated', function(event) {
		session.subscribe(event.stream, 'subscriber_'+conversacion, {
			insertMode: 'append',
			width: '80%',
			height: '150px',
		});
	});

	session.on('sessionDisconnected', function(event) {
		console.log('You were disconnected from the session.', event.reason);
	});

	// Connect to the session
	session.connect(token, function(error) {
		// If the connection is successful, initialize a publisher and publish to the session
		/*if (!error) {
		 var publisher = OT.initPublisher('publisher', {
		 insertMode: 'append',
		 width: '100%',
		 height: '100%'
		 });

		 session.publish(publisher);
		 } else {
		 console.log('There was an error connecting to the session: ', error.code, error.message);
		 }*/
	});
}

function CerrarSesionVideo(conversacion)
{
	var sessionId=$('#'+conversacion).attr('video_sessionId');
	session = OT.initSession(apiKey, sessionId);
	session.disconnect();
}
