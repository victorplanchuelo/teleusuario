<?php

return [

	'verification_email' => [
		'title'   => 'Validación del Correo Electrónico',
		'body'    => 'Para validar su correo electrónico y continuar con su registro debe pulsar el siguiente botón',
		'button'  => 'Validar correo electrónico',
	],

	'reset_password' => [
		'title'  => 'Reseteo de contraseña',
		'line1'  => 'Estas recibiendo este correo porque hemos recibido una petición de reseteo de contraseña para tu cuenta',
		'line2'  => 'Si no realizaste esta petición, no es necesario que realices ninguna acción',
		'button' => 'Reseteo de contraseña',
		'error'  => 'Se ha producido un error y no se ha podido resetear la contraseña. Por favor, póngase en contacto con nosotros para más detalle',
		'subcopy' =>'Si tienes problemas al pulsar el botón "Reseteo de contraseña", copia y pega la siguiente dirección en tu navegador web: ',
	],

	'regards' => 'Un saludo',

	'create_ticket' => [
		'title' => 'Nuevo ticket abierto',
		'body1' => 'Se ha abierto un nuevo ticket que afecta a tu departamento. A continuación se detalla el ticket.',
		'data' => [
			'title' => 'Título del ticket',
			'message' => 'Mensaje',
			'user' => 'Código de usuaria',
			'motive' => 'Motivo del ticket',
			'urgent' => '¿Es urgente?',
			'yes' => 'SI',
			'no' => 'NO',
		],
	],

	'update_ticket' => [
		'title' => 'Tu ticket se ha actualizado.',
		'body1' => 'Tu ticket con ID ',
		'body2' => ' ha sufrido modificaciones',
		'data' => [
			'panel' => 'Datos del ticket:',
			'title' => 'Título del ticket',
			'motive' => 'Motivo del ticket',
		],
		'button' => 'Pulsa aquí para ver el ticket',
	],
];