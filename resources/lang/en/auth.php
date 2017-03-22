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

    'failed'       => 'These credentials do not match our records.',
    'throttle'     => 'Too many login attempts. Please try again in :seconds seconds.',
	'registration' => [
		'error'        => [
			'created_application_user' => 'An error has occured creating the new application user. Please, try again later.',
			'user_deleted'             => 'User has been deleted',
			'user_already_exist'       => 'There is already a user with that E-Mail/Phone number',
			'pending_validate'         => 'Your user is pending to be activated. A person will contact you soon in order to complete your registration.',
			'pending_validate_email'   => 'To continue with your user validation, it is necessary you validate your email. Please, check your inbox.',
			'email_already_validate'   => "Previously you've already validated your e-mail",
		],
	],
];
