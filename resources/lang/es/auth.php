<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Authentication Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines are used during authentication for various
    | messages that we need to display to the user. You are free to modify
    | these language lines according to your application's requirements.
    |
    */

    'failed'       => 'Las credenciales insertadas no coinciden con ningún registro de la Base de Datos',
    'throttle'     => 'Demasiados intentos de inicio de sesión fallidos. Por favor, inténtelo de nuevo en :seconds segundos.',
	'registration' => [
		'error'        => [
			'created_application_user' => 'Se ha producido un error en la creación del registro del usuario. Por favor, inténtelo de nuevo en más tarde.',
			'user_deleted'             => 'El usuario ha sido dado de baja',
			'user_already_exist'       => 'Ya existe un usuario con ese Telefono/Correo Electrónico',
			'pending_validate'         => 'Tu usuario está pendiente de ser activado. En breve una persona se pondrá en contacto para finalizar su registro.',
			'pending_validate_email'   => 'Para continuar con la validación de su usuario es necesario que valide el email. Por favor, revise su bandeja de entrada.',
			'email_already_validate'   => 'Ya habías validado tu correo electrónico con anterioridad',
		],
	],

	'validated_email' => [
		'error'            => 'Se ha producido un error en la validación de su correo electrónico. Por favor, pongasé en contacto con nosotros para solucionar el problema',
	],

];
