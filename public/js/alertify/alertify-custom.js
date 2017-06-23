function reset () {
	$("#toggleCSS").attr("href", "../themes/alertify.default.css");
	alertify.set({
		labels : {
			ok     : "OK",
			cancel : "Cancel"
		},
		delay : 5000,
		buttonReverse : false,
		buttonFocus   : "ok"
	});
}

// ==============================
// Standard Dialogs
$("#alert").on( 'click', function () {
	reset();
	alertify.alert("This is an alert dialog");
	return false;
});

$("#confirm").on( 'click', function () {
	reset();
	alertify.confirm("This is a confirm dialog", function (e) {
		if (e) {
			alertify.success("You've clicked OK");
		} else {
			alertify.error("You've clicked Cancel");
		}
	});
	return false;
});

$("#prompt").on( 'click', function () {
	reset();
	alertify.prompt("This is a prompt dialog", function (e, str) {
		if (e) {
			alertify.success("You've clicked OK and typed: " + str);
		} else {
			alertify.error("You've clicked Cancel");
		}
	}, "Default Value");
	return false;
});

// ==============================
// Ajax
$("#ajax").on("click", function () {
	reset();
	alertify.confirm("Confirm?", function (e) {
		if (e) {
			alertify.alert("Successful AJAX after OK");
		} else {
			alertify.alert("Successful AJAX after Cancel");
		}
	});
});

// ==============================
// Standard Dialogs
$("#notification").on( 'click', function () {
	reset();
	alertify.log("Standard log message");
	return false;
});

$("#success").on( 'click', function () {
	reset();
	alertify.success("Success log message");
	return false;
});

$("#error").on( 'click', function () {
	reset();
	alertify.error("Error log message");
	return false;
});

// ==============================
// Custom Properties
$("#delay").on( 'click', function () {
	reset();
	alertify.set({ delay: 10000 });
	alertify.log("Hiding in 10 seconds");
	return false;
});

$("#forever").on( 'click', function () {
	reset();
	alertify.log("Will stay until clicked", "", 0);
	return false;
});

$("#labels").on( 'click', function () {
	reset();
	alertify.set({ labels: { ok: "Accept", cancel: "Deny" } });
	alertify.confirm("Confirm dialog with custom button labels", function (e) {
		if (e) {
			alertify.success("You've clicked OK");
		} else {
			alertify.error("You've clicked Cancel");
		}
	});
	return false;
});

$("#focus").on( 'click', function () {
	reset();
	alertify.set({ buttonFocus: "cancel" });
	alertify.confirm("Confirm dialog with cancel button focused", function (e) {
		if (e) {
			alertify.success("You've clicked OK");
		} else {
			alertify.error("You've clicked Cancel");
		}
	});
	return false;
});

$("#order").on( 'click', function () {
	reset();
	alertify.set({ buttonReverse: true });
	alertify.confirm("Confirm dialog with reversed button order", function (e) {
		if (e) {
			alertify.success("You've clicked OK");
		} else {
			alertify.error("You've clicked Cancel");
		}
	});
	return false;
});

// ==============================
// Custom Log
$("#custom").on( 'click', function () {
	reset();
	alertify.custom = alertify.extend("custom");
	alertify.custom("I'm a custom log message");
	return false;
});

// ==============================
// Custom Themes
$("#bootstrap").on( 'click', function () {
	reset();
	$("#toggleCSS").attr("href", "../themes/alertify.bootstrap.css");
	alertify.prompt("Prompt dialog with bootstrap theme", function (e) {
		if (e) {
			alertify.success("You've clicked OK");
		} else {
			alertify.error("You've clicked Cancel");
		}
	}, "Default Value");
	return false;
});











////////////////////// MI CODIGO
function mi_reset () {
	$("#toggleCSS").attr("href", "../themes/alertify.default.css");
	alertify.set({
		labels : {
			ok     : "Si",
			cancel : "No"
		},
		delay : 5000,
		buttonReverse : false,
		buttonFocus   : "ok"
	});
}

$("#send-private-key").on( 'click', function () {
	mi_reset();
	alertify.confirm($('#pkey-msg').data('message'), function (e) {
		if (e) {

			//Pulsó OK
			action = $('#send-private-key').attr('action');

			var token_seguridad = $('input[name="_token"]').val();

			var id_autonoma = $('.id_anuncio_premium').data('anuncio');
			var id_cliente = $('.id_anuncio_cliente').data('anuncio');

			var formData = {
				autonoma: id_autonoma,
				cliente: id_cliente,
				_token: token_seguridad,
			};

			// CSRF protection
			$.ajaxSetup(
			{
				headers:
				{
					'X-CSRF-Token': token_seguridad
				}
			});

			$.ajax({
				url: action,
				data: formData,
				type: "POST",
				success: function (data) {
					if(data.success === 0)
					{
						alertify.error(data.alert);
						return false;
					}

					//Si no es 0 quiere decirse que se ha guardado la nota bien
					alertify.success(data.alert);

					//Añadimos la nueva nota en el apartado de las notas
					$('.chats').append(
						createPKeyMessage(data.message)
					).show(1000);
					MostrarUltimoMensaje();
				},
				error: function(response) {
					alertify.error(response.responseText);
				}
			});
		}
	});
	return false;
});


function createPKeyMessage(message)
{
	var img = $('.img-premium').attr('src');
	var name = $('.nombre_premium').text();

	return '<li class="out"><img class="avatar" src="' + img + '" /><div class="message"><p class="date"><strong>' + name + ' - Ahora</strong></p><p class="inffo">' + message + '</p></div></li>';
}


/*
*
* //Llamada AJAX para cuando quiera la autónoma enviar la llave privada
 $('#send-private-key').on('submit', function(e){
 e.preventDefault();



 e.stopPropagation();

 });
*
*
* */