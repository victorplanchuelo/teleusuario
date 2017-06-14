<?php

return [

	/*
	|--------------------------------------------------------------------------
	| Dashboard Language Lines
	|--------------------------------------------------------------------------
	|
	*/


	'title'                => 'Panel de Control',
	'welcome_message'      => 'Bienvenido/a al Panel de Control de Teleusuario',
	'level'                => 'Nivel',
	'scores'               => 'Puntuación',

	'header' => [
		'logout' => 'Desconectar',
		'code'   => 'Código',
		'profile' => 'Ver perfil',
		'change_pwd' => 'Cambiar contraseña',
	],

	'navbar' => [
		'settings' => [
			'title' => 'Configuración',
			'profile' => 'Perfil usuario',
			'change_pwd' => 'Cambio contraseña',
			'logout' => 'Desconectarse',
		],

		'tasks' => [
			'title' => 'Tareas',
			'completed_tasks' => 'Tareas completadas',
			'ranking' => 'Ranking',
		],

		'teleusuario' => [
			'title' => 'Servicios activos',
			'messages' => 'Mensajes',
			'winks' => 'Guiños',
			'chats' => 'Chats',
			'muropost' => 'Muropost',
			'publish_posts' => 'Anuncios publicados',
			'liruch_calls' => 'Llamadas Liruch',
			'erotic_calls' => 'Llamadas eróticas',
		],

	],

	'change_password' => [
		'title' => 'Cambiar Contraseña',
		'password' => 'Contraseña',
		'password_confirm' => 'Repite contraseña',
		'submit' => 'Cambiar contraseña',
		'message' => [
			'success' => 'La contraseña se cambió correctamente.',
			'error' => 'La nueva contraseña no puede ser igual a la anterior.',
			'label1' =>'¡Recuerda!',
			'label2' => 'La contraseña debe contener caracteres alfanuméricos y debe tener un tamaño mínimo de 6 caracteres',
		],
	],

	'profile' => [
		'title' => 'Perfil de usuario',

		'tabs' => [
			'general' => 'Información general',
			'bank' => 'Datos bancarios',
			'services' => 'Servicios',
			'invoices' => 'Facturas',
		],
		'labels' => [
			'upload_image' => 'Subir imagen',
			'code' => 'Código Usuario',
			'alias' => 'Alias',
			'name' => 'Nombre completo',
			'phone' => 'Teléfono contacto',
			'connection_phone' => 'Teléfono conexión',
			'email' => 'Correo Electrónico',
			'country' => 'Pais',
			'province' => 'Provincia',
			'city' => 'Población',
			'address' => 'Dirección',
			'cp' => 'Código postal',
			'genre' => [
				'title' => 'Género',
				'male' => 'Masculino',
				'female' => 'Femenino',
			],
			'leave_reason' => 'Motivo de baja',
			'birthdate' => 'Fecha nacimiento',
			'age' => 'Edad',
			'nif' => 'NIF',
			'bank' => 'Nombre del banco',
			'bank_code' => 'Código banco',
			'iban' => 'IBAN',
			'swift' => 'Swift/BIC',
			'start_date' => 'Fecha inicio',
			'end_date' => 'Fecha fin',
			'active' => 'Activo',
		],

		'fieldsets' => [
			'user_data' => 'Datos de usuario',
			'personal_data' => 'Datos personales',
		],
		'messages' => [
			'success' => 'La imagen de perfil se ha subido correctamente.',
			'error' => 'Se ha producido un error al subir la imagen de perfil.',
		],

	],

	'ranking' => [
		'title' => 'Ranking',
	],

	'messages' => [
		'title' => 'Servicio de Mensajes',
		'form' => [
			'start_date' => 'Fecha inicio',
			'end_date' => 'Fecha fin',
			'submit' => 'Enviar',
			'profile' => [
				'yours' => [
					'data' => 'Tus datos',
					'zoom' => 'Click para ampliar imagen',
				],
				'client' => [
					'data' => 'Datos del cliente',
					'zoom' => 'Click para ampliar imagen',
					'credits' => 'Créditos:',
				],
			],
			'pkey' => [
				'title' => 'Enviar llave privada',
				'message' => 'Recuerda que este servicio se usa para mantener a los clientes con algo de suspense, 
								por lo que te aconsejamos no usarlo con demasiada frecuencia. 
								¿Estás segura que quieres enviar la llave privada a este usuario?',
				'success' => 'La llave privada ha sido enviada correctamente. Ahora, él cliente puede ver todas las fotos de tu actual perfil.',
				'error' => 'Se ha producido un error enviando la llave privada. Por favor, inténtelo de nuevo más tarde.',
				'msg_success' => 'Llave privada enviada. Ahora puedes ver todas sus fotos.',
			],
			'notes' => [
				'write' => 'Escribir notas',
				'send' => 'Enviar',
				'notes' => 'Notas de la conversación',
			],
		],
	],

	'wink' => [
		'title' => 'Servicio de Guiños',
		'form' => [
			'profile' => [
				'yours' => [
					'data' => 'Tus datos',
					'zoom' => 'Click para ampliar imagen',
				],
				'client' => [
					'data' => 'Datos del cliente',
					'zoom' => 'Click para ampliar imagen',
					'credits' => 'Créditos:',
				],
			],
			'notes' => [
				'write' => 'Escribir notas',
				'send' => 'Enviar',
				'notes' => 'Notas de la conversación',
			],
			'info' => [
				'location' => 'Ubicación',
			],
		],
	],

	'chats' => [
		'title' => 'Servicio de Chats',
		'errors' => [
			'entertainer_not_sent' => 'El código de la animadora no fue enviado correctamente',
			'last_conn_not_updated' => 'La actualización de los datos en la base de datos ha devuelto un error inesperado.',
			'data_not_sent_correctly' => 'Algunos de los datos requeridos para realizar la acción no fueron enviados correctamente.',
			'not_valid_message' => 'Debes escribir algo en la caja de texto del mensaje de esa conversación',
			'invalid_conversation' => 'Ha habido un error en la conversación y tu mensaje no ha podido ser enviado.',
			'message_not_sent' => 'Se ha producido un error enviando el mensaje. Por favor, intentelo de nuevo.',
			'introduce_message' => 'Por favor, introduce un mensaje válido',
			'not_close_client_havent_time' => 'No puedes cerrar este chat. El cliente aún tiene tiempo para hablar contigo.',
		],
	],


	'task' => [
		'message' => [
			'conversation' => [
				'error' => [
					'code_not_valid' => 'No se ha podido enviar correctamente el código.',
					'general_error' => 'Se ha producido un error en la petición de mensajes de la tarea',
				],
			],
			'info' => [
				'location' => 'Ubicación',
			],
			'create_note' => [
				'success' => 'Se ha creado correctamente la nueva nota',
				'error' => 'Se ha producido un error creando la nueva nota',
			],
			'send_message' => [
				'error' => 'Se ha producido un error enviando el mensaje.',
				'success' => 'El mensaje se ha enviado correctamente.',
			],
		],
		'wink' => [
			'info' => [
				'location' => 'Ubicación',
			],
		],

		'chats' => [
			'update_last_conn_entertainer' => [
				'error' => 'Se ha producido un error actualizando la última conexión de la animadora',
			],
			'update_premium_connection' => [
				'error' => 'Se ha producido un error actualizando la última conexión de la usuaria premium',
			],
			'load_conversation' => [
				'error' => 'Se ha producido un error cargando los mensajes de la conversación.',
			],
			'video_chat' => [
				'error' => 'Se ha producido un error mostrando el VideoChat.',
			],
			'send_chat_message' => [
				'error' => 'Se ha producido un error enviando el mensaje de la conversación de chat.',
			],
			'mark_message_as_read' => [
				'error' => 'Se ha producido un error marcando el mensaje como leído.',
			],
			'create_chat_note' => [
				'error' => 'Se ha producido un error creando una nueva nota para esta conversación.',
			],
			'reversed_chat' => [
				'error' => 'Se ha producido un error obteniendo los chats revertidos.',
			],
			'disconnected_reversed_chat' => [
				'error' => 'Se ha producido un error obteniendo los chats revertidos desconectados.',
			],
		],
	],
];