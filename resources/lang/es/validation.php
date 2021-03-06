<?php

return [
	
	//Mensajes que aparecen en Login
	'email_validate'	    => 'Tu correo electrónico se ha validado correctamente. En breve una persona se pondrá en contacto para finalizar su registro.',
	'email_already_validate'=> 'Tu correo ya fue validado con antelación. En breve una persona se pondrá en contacto para finalizar su registro.',

	// Parte del MAIL
	'mail_subject'		    => 'Verificación de Correo Electrónico',

	//Mensaje cuando se ha insertado el usuario en el registro previo.
	'verification_message'  => "Te hemos enviado un correo electrónico para verificar tu cuenta de correo electrónico",
	
	//Placeholders de los campos en el registro de usuarios
	'full_name'			    => 'Nombre y Apellidos',
	'phone'				    => 'Teléfono',
	'email_ph'			    => 'Correo Electrónico',
	'birthdate'			    => 'Fecha de Nacimiento',
	'password'			    => 'Contraseña (sólo letras y números)',
	'password_confirmation' => 'Repite Contraseña',
	'male'                  => 'Masculino',
	'female'                => 'Femenino',
	
	
	//Formulario del Login
	'code_user'			    => 'Código',
	'password_login'	    => 'Contraseña',
	
	
	//Formulario de registro
	'title_form'		    => 'Registro de nuevo usuario.',
	'terms'				    => 'Debe aceptar los términos y condiciones',
	'sign_up'			    => 'Registrarse',
	'login'				    => 'Iniciar Sesión',
	'remember'			    => 'Recordar sesión',
	'register_label'	    => '¿Nuevo/a en Teleusuario?',
	'register_a'		    => 'Regístrate',
	'recovery_label'	    => '¿Olvidaste tu contraseña?',
	'login_label'	        => '¿Ya tienes cuenta?',
	'login_a'		        => 'Inicia sesión',
	'accept_terms'		    => 'Acepto terminos y condiciones de uso',
	'age' 				    => 'Debes tener, al menos, 18 años para poder registrarte',
	'phone_prefix'          => 'No se permiten telefonos con prefijo 80... o 90...',

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted'             => ':attribute debe ser aceptado.',
    'active_url'           => ':attribute no es una URL válida.',
    'after'                => ':attribute debe ser una fecha posterior a :date.',
    'alpha'                => ':attribute sólo puede contener letras.',
    'alpha_dash'           => ':attribute sólo puede contener letras, números y guiones',
    'alpha_num'            => ':attribute sólo puede contener letras y números',
    'array'                => ':attribute debe ser un array.',
    'before'               => ':attribute debe ser una fecha anterior a :date.',
    'between'              => [
        'numeric' => ':attribute debe ser un número comprendido entre :min y :max.',
        'file'    => ':attribute debe ser un archivo con un tamaño entre :min y :max kilobytes.',
        'string'  => ':attribute debe ser un texto de entre :min y :max caracteres.',
        'array'   => ':attribute debe ser una array de entre :min y :max items.',
    ],
    'boolean'              => ':attribute debe ser verdadero o falso.',
    'confirmed'            => 'La confirmación de :attribute no coincide.',
    'date'                 => ':attribute no es una fecha válida.',
    'date_format'          => ':attribute no coincide con el formato dd/mm/aaaa',
    'different'            => ':attribute y :other deben ser diferentes.',
    'digits'               => ':attribute debe ser de :digits dígitos.',
    'digits_between'       => ':attribute debe tener entre :min y :max dígitos.',
    'distinct'             => ':attribute tiene un valor duplicado.',
    'email'                => ':attribute debe ser una dirección de correo electrónico correcta.',
    'exists'               => ':attribute que ha selecionado es inválido.',
    'filled'               => ':attribute es requerido.',
    'image'                => ':attribute debe ser una imagen.',
    'in'                   => ':attribute seleccionado es inválido.',
    'in_array'             => ':attribute no existe en :other.',
    'integer'              => ':attribute debe ser un valor entero (número).',
    'ip'                   => ':attribute debe ser una dirección IP válida.',
    'json'                 => ':attribute debe tener un formato JSON válido.',
    'max'                  => [
        'numeric' => ':attribute no debe ser mayor que :max.',
        'file'    => ':attribute no debe superar los :max kilobytes.',
        'string'  => ':attribute no debe tener más de :max caracteres.',
        'array'   => ':attribute no debe tener más de :max items.',
    ],
    'mimes'                => ':attribute debe ser un archivo de tipo: :values.',
    'min'                  => [
        'numeric' => ':attribute debe ser menor de :min.',
        'file'    => ':attribute debe superar los :min kilobytes.',
        'string'  => ':attribute debe tener más de :min caracteres.',
        'array'   => ':attribute debe contener más de :min items.',
    ],
    'not_in'               => ':attribute es inválido.',
    'numeric'              => ':attribute debe ser un número.',
    'present'              => ':attribute debe estar presente.',
    'regex'                => 'El formato de :attribute es inválido.',
    'required'             => ':attribute es requerido.',
    'required_if'          => ':attribute es requerido cuando :other es :value.',
    'required_unless'      => ':attribute es requerido a menos de que :other esté en :values.',
    'required_with'        => ':attribute es requerido cuando :values esté presente.',
    'required_with_all'    => ':attribute es requerido cuando :values esté presente.',
    'required_without'     => ':attribute es requerido cuando :values no está presente.',
    'required_without_all' => ':attribute es requerido cuando ninguno de :values están presentes.',
    'same'                 => ':attribute y :other deben ser idénticos.',
    'size'                 => [
        'numeric' => ':attribute debe tener :size dígitos.',
        'file'    => ':attribute debe ser de :size kilobytes.',
        'string'  => ':attribute debe tener :size caracteres.',
        'array'   => ':attribute debe contener :size items.',
    ],
    'string'               => ':attribute debe ser una cadena de caracteres.',
    'timezone'             => ':attribute debe estar en una zona válida.',
    'unique'               => 'El valor de :attribute ya ha sido tomado.',
    'url'                  => 'El formato de :attribute es inválido.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
	    'profile_image' => [
		    'required' => 'La imagen de perfil es un valor requerido',
		    'max' => 'La imagen de perfil no puede superar los 2048 kilobytes',
		    'mime' => 'La imagen de perfil debe ser de tipo: jpeg,jpg o png',
		    'image' => 'La imagen de perfil debe ser una imagen',
	    ],
	    'task' => [
		    'messages' => [
			    'note' => [
				    'required' => 'Para crear una nueva nota debe rellenar con algún dato la caja de texto correspondiente',
				    'min' => 'La nota debe tener, al menos, 4 carácteres',
			    ],
			    'message' => [
				    'required' => 'Para enviar un mensaje debe escribir un texto de, al menos, 4 carácteres',
				    'min' => 'El mensaje debe tener, al menos, 4 carácteres',
			    ],
		    ],
	    ],
	    'notifications' => [
		    'type' => [
			    'required' => 'Debes elegir un tipo de notificación',
		    ],
		    'user' => [
			    'required' => 'Debes elegir los usuarios que recibirán la notificación',
			    'choose' => 'Debes seleccionar "Todos los usuarios" para enviar la notificación a todos, o marcar los usuarios específicos que recibirán la notificación'
		    ],
		    'message' => [
			    'require' => 'Debes escribir un mensaje para la notificación',
			    'min' => 'Debes escribir un mensaje con, al menos, 10 caracteres',
		    ],
	    ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes' => [
    	'name' => 'Nombre',
	    'email' => 'Correo Electrónico',
	    'phone' => 'Teléfono',
	    'genre' => 'Género',
	    'birthdate' => 'Fecha de Nacimiento',
	    'password' => 'Contraseña',
	    'password_confirmation' => 'Confirmación de contraseña',
	    'code' => 'Código',

	    //PARTE TICKETS
	    'message' => 'Mensaje',
	    'title' => 'Título',
	    'category' => 'Categoría',
	    'motive' => 'Motivo',
    ],

];

