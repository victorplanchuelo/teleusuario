<?php

return [

	/*
	|--------------------------------------------------------------------------
	| Dashboard Language Lines
	|--------------------------------------------------------------------------
	|
	*/

	'title'                => 'Dashboard',
	'welcome_message'      => 'Welcome to Teleusuario Dashboard',
	'level'                => 'Level',
	'scores'               => 'Scores',

	'notifications' => [
		'pending_notification' => 'You have important unread notifications. Please, go to your ',
		'list_notification' => 'list of notifications',
		'new' => [
			'success' => 'The notification was sent successfully to the users selected',
			'form' => [
				'message' => 'Message',
				'type' => 'Type of message',
				'aimed_at' => 'Aimed at',
				'new' => 'Create Notification',
				'types' => [
					'select' => 'Select type',
					'danger' => 'Danger',
					'warning' => 'Warning',
					'info' => 'Info',
					'congrat' => 'Congratulation',
				],
				'user' => 'Users',
				'users' => [
					'select' => 'Select user(s)',
					'all' => 'All users',
				],
			],
		],
	],

	'header' => [
		'logout' => 'Logout',
		'code'   => 'Code',
		'profile' => 'View profile',
		'change_pwd' => 'Change password',
		'notifications' => [
			'message1' => 'You have ',
			'message2' => ' unread notifications',
			'all_notifications' => 'See all notifications',
		],
	],

	'navbar' => [
		'settings' => [
			'title' => 'Settings',
			'profile' => 'User profile',
			'change_pwd' => 'Change password',
			'logout' => 'Logout',
		],
		'tasks' => [
			'title' => 'Tasks',
			'completed_tasks' => 'Completed Tasks',
			'ranking' => 'Ranking',
		],

		'tickets' => [
			'title' => 'Ticket System',
			'new' => 'New ticket',
			'list' => 'Your tickets',
		],

		'notifications' => [
			'title' => 'Notifications',
			'new' => 'New notification',
			'list' => 'List of notifications',
		],

		'teleusuario' => [
			'title' => 'Active services',
			'messages' => 'Messages',
			'winks' => 'Winks',
			'chats' => 'Chats',
			'muropost' => 'Muropost',
			'publish_posts' => 'Publish posts',
			'liruch_calls' => 'Liruch calls',
			'erotic_calls' => ' Erotics calls',
			'boyfriends' => 'Boyfriends',
		],
	],


	'change_password' => [
		'title' => 'Change Password',
		'password' => 'Password',
		'password_confirm' => 'Password confirm',
		'submit' => 'Change password',
		'message' => [
			'success' => 'Password was changed successfully',
			'error' => 'New password cannot be the same than the old one.',
			'label1' =>'Remember!',
			'label2' => 'Password must contain alphanumeric characters and must be at least 6 characters long',
		],
	],

	'profile' => [
		'title' => 'User profile',
		'tabs' => [
			'general' => 'General information',
			'bank' => 'Bank data',
			'services' => 'Services',
			'invoices' => 'Invoices',
		],

		'labels' => [
			'upload_image' => 'Upload image',
			'code' => 'User code',
			'alias' => 'Alias',
			'name' => 'Full name',
			'phone' => 'Contact phone',
			'connection_phone' => 'Connection phone',
			'email' => 'E-mail',
			'country' => 'Country',
			'province' => 'Province',
			'city' => 'City',
			'address' => 'Address',
			'cp' => 'Postal code',
			'genre' => [
				'title' => 'Genre',
				'male' => 'Male',
				'female' => 'Female',
			],
			'leave_reason' => 'Leave reason',
			'birthdate' => 'Birthdate',
			'age' => 'Age',
			'nif' => 'Id Number',
			'bank' => 'Bank name',
			'bank_code' => 'Bank code',
			'iban' => 'IBAN',
			'swift' => 'Swift/BIC',
			'start_date' => 'Start date',
			'end_date' => 'End date',
			'active' => 'Active',
		],

		'fieldsets' => [
			'user_data' => 'User data',
			'personal_data' => 'Personal data',
		],
		'messages' => [
			'success' => 'Profile image has been upload successfully',
			'error' => 'An error has occurred uploading the profile image',
		],

	],

	'ranking' => [
		'title' => 'Ranking',
	],

	'messages' => [
		'title' => 'Message Service',
		'form' => [
			'start_date' => 'Start date',
			'end_date' => 'End date',
			'submit' => 'Submit',
			'profile' => [
				'yours' => [
					'data' => 'Your profile',
					'zoom' => 'Click to enlarge image',
				],
				'client' => [
					'data' => 'Client profile',
					'zoom' => 'Click to enlarge image',
					'credits' => 'Credits:',
				],
			],
			'pkey' => [
				'title' => 'Send Private Key',
				'message' => 'Remember that this service is used to maintain clients with a bit of suspense, so we advice you not to use it too frequent. Are you sure you want to send the private key to this user?',
				'success' => 'The private key was sent successfully. Now, he can watch all the photos of your profile.',
				'error' => 'An error occurred sending the private key. Please, try it again later.',
				'msg_success' => 'Private key sent. Now you can watch all her photos.',
			],
			'notes' => [
				'write' => 'Write notes',
				'send' => 'Send',
				'notes' => 'Notes of the conversation',
			],
		],
	],

	'wink' => [
		'title' => 'Wink Service',
		'form' => [
			'profile' => [
				'yours' => [
					'data' => 'Your profile',
					'zoom' => 'Click to enlarge image',
				],
				'client' => [
					'data' => 'Client profile',
					'zoom' => 'Click to enlarge image',
					'credits' => 'Credits:',
				],
			],
			'notes' => [
				'write' => 'Write notes',
				'send' => 'Send',
				'notes' => 'Notes of the conversation',
			],
			'info' => [
				'location' => 'Location',
			],
		],
	],

	'chats' => [
		'title' => 'Chat Service',
		'text' => [
			'wrote' => 'wrote: ',
			'reversed1' => 'Remember that you opened this chat.',
			'reversed2' => 'It is supposed that you have been the one who has watched boy\'s advertisement and you has opened the chat.',
		],
		'errors' => [
			'entertainer_not_sent' => 'The entertainer\'s code was not sent successfully',
			'last_conn_not_updated' => 'An unexpected error was given back while updating data into database.',
			'data_not_sent_correctly' => 'Some of required data was not sent successfully to the server.',
			'not_valid_message' => 'You must write something within the message textbox of this conversation.',
			'invalid_conversation' => 'There have been an error in the conversation and your message has not been able to be sent.',
			'message_not_sent' => 'An error has occurred sending the message. Please, try again.',
			'introduce_message' => 'Please, introduce a valid message',
			'not_close_client_havent_time' => 'You cannot close this chat. The client haven\'t got time to speak with you yet.',
			'data_missing' => 'Some data hasn\'t been able to load correctly',
		],
	],

	'boyfriends' => [
		'title' => 'Boyfriends',
		'errors' => [
			'data_not_sent_correctly' => 'Some of the required data to realice the action was not sent correctly',
			'no_boyfriends_or_message_already_sent' => 'You do not have boyfriends yet, or you have sent a message/chat to all of them in the last ',
			'no_boyfriends_or_message_already_sent_2' => ' days. Try it again later.',
			'no_boyfriends_or_message_already_sent_3' => 'A boy will be your boyfriend when you have sent him  ',
			'no_boyfriends_or_message_already_sent_4' => ' messages to his inbox or you have chatting with him for ',
			'no_boyfriends_or_message_already_sent_5' => ' hours.',
		],
		'load_boyfriend_chat' => [
			'success' => 'The chat has been loaded successfully. Next, we redirect you to the chat page in order to be able to start the conversation.',
			'error' => [
				'session_not_created' => 'An error has occurred trying to create the session.',
				'conversation_not_getting' => 'An error has occurred trying to obtain the conversation.',
				'user_not_connected_or_already_chatting' => 'User is not connected or is already chatting. Try it later.',
				'chat_not_opened' => 'An error has occurred trying to open the chat',
			],
		],
	],

	'task' => [
		'message' => [
			'conversation' => [
				'error' => [
					'code_not_valid' => 'Code has not been able to send correctly.',
					'general_error' => 'An error occurred asking for task messages.',
				],
			],
			'info' => [
				'location' => 'Location',
			],
			'create_note' => [
				'success' => 'The new note has been created successfully',
				'error' => 'An error occurred creating the new note',
			],
			'send_message' => [
				'error' => 'An error occurred sending the message.',
				'success' => 'The message was sent successfully.',
			],
		],
		'wink' => [
			'info' => [
				'location' => 'Location',
			],
		],
		'chats' => [
			'update_last_conn_entertainer' => [
				'error' => 'An error occurred updating entertainer\'s last connection.',
			],
			'update_last_premium_connection' => [
				'error' => 'An error occurred updating premium\'s last connection.',
			],
			'load_conversation' => [
				'error' => 'An error occurred loading the conversation.',
			],
			'video_chat' => [
				'error' => 'An error occurred loading the VideoChat.',
			],
			'send_chat_message' => [
				'error' => 'An error occurred sending the message of the chat conversation.',
			],
			'mark_message_as_read' => [
				'error' => 'An error occurred marking the message as read.',
			],
			'create_chat_note' => [
				'error' => 'An error occurred creating a note for this conversation.',
			],
			'reversed_chat' => [
				'error' => 'An error occurred getting the reversed chats.',
			],
			'disconnected_reversed_chat' => [
				'error' => 'An error occurred getting the disconnected reversed chats.',
			],

		],
	],

	'tickets' => [
		'create_ticket' => [
			'title' => 'Create new ticket',
			'form' => [
				'name' => 'Title',
				'category' => 'Category',
				'select_category' => 'Select Category',
				'message' => 'Description',
				'open_ticket' => 'Open ticket',
				'motive' => 'Motive',
				'select_motive' => 'Select Motive',
				'urgent' => 'Is it urgent?',
			],

			'responses' => [
				'ticket_with_id' => 'Ticket with ID #',
				'opened' => ' has been opened',
				'closed' => ' has been closed',
				'being_checked' => ' is being checked',
				'answered' =>' has been answered',
			],

			'message' => [
				'success' => 'The ticket has been created successfully',
				'error' => 'There was a problem creating the ticket.',
			],
		],
		'list_tickets' => [
			'title' => 'List of your tickets',
			'data' => [
				'open' => 'Open',
				'close' => 'Close',
				'motive' => 'Motive',
				'title' => 'Title',
				'status' => 'Status',
				'last_updated' => 'Last Updated',
				'empty' => 'You have not created any tickets yet.'
			],
		],

		'show_ticket' => [
			'title' => 'Ticket',
			'data' => [
				'open' => 'Open',
				'close' => 'Close',
				'cat&mot' => 'Category and Motive',
				'title' => 'Title',
				'status' => 'Status',
				'created_at' => 'Date of creation',
				'last_update' => 'Last update',
				'submit' => 'Submit comment',
				'message' => 'Message',
				'success' => 'Your comment has be submitted.',
			],
		],

		'close_ticket' => [
			'success' => 'The ticket has been closed.',
		],

		'reopen_ticket' => [
			'success' => 'The ticket has been reopened.',
		],
	],
];