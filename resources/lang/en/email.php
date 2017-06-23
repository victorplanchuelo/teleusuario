<?php

return [

	'verification_email' => [
		'title'   => 'Email Validation',
		'body'    => 'To validate your email and continue with your registration, please click the below button',
		'button'  => 'Validate your email',
	],

	'reset_password' => [
		'title'  => 'Reset password',
		'line1'  => 'You are receiving this email because we received a password reset request for your account.',
		'line2'  => 'Si no realizaste esta petición, no es necesario que realices ninguna acción',
		'button' => 'Reset password',
		'error'  => 'An error has occurred and your password couldn\'t be reset. Please, contact us to more datails',
		'subcopy' =>'If you’re having trouble clicking the "Reset Password" button, copy and paste the URL below into your web browser: ',
	],

	'regards' => 'Regards',

	'create_ticket' => [
		'title' => 'New ticket opened',
		'body1' => 'A new ticket which affects to your department was opened. Afterwards the ticket is detailed.',
		'data' => [
			'title' => 'Ticket title',
			'message' => 'Message',
			'user' => 'User code',
			'motive' => 'Ticket motive',
			'urgent' => 'Is it urgent?',
			'yes' => 'YES',
			'no' => 'NO',
		],
	],

	'update_ticket' => [
		'title' => 'Your ticket has been updated',
		'body1' => 'Your ticket with ID ',
		'body2' => ' has undergone changes',

		'data' => [
			'panel' => 'Ticket Data:',
			'title' => 'Ticket title',
			'motive' => 'Ticket motive',
		],
		'button' => 'Click here to view the ticket',
	],

];