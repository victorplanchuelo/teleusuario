<?php

return [
	
	'email_validate'	    => 'Your E-Mail has been validated successfully. A person will contact you soon in order to complete your registration.',
	'email_already_validate'=> 'Your E-Mail was already validated. A person will contact you soon in order to complete your registration.',

	'mail_subject'		    => 'E-Mail Verification',
	'verification_message'  => "We've sent you an e-mail to your account in order to verify it.",

	'full_name'			    => 'Full Name',
	'phone'				    => 'Phone Number',
	'email_ph'			    => 'E-Mail',
	'birthdate'			    => 'Date of birth',
	'password'			    => 'Password (only letters and numbers)',
	'password_confirmation' => 'Repeat Password',

	'male'                  => 'Male',
	'female'                => 'Female',
	
	'code_user'			    => 'Code',
	'password_login'	    => 'Password',
	
	
	'title_form'		    => 'Sign up',
	'terms'				    => 'You must accept Terms and Conditions checkbox',
	'sign_up'			    => 'Sign Up',
	'login'				    => 'Sign In',
	'remember'			    => 'Remember',
	'recovery_label'	    => 'Forgot your password?',
	'register_label'	    => 'New in Teleusuario?',
	'register_a'		    => 'Create an account',
	'login_label'	        => 'Already have an account?',
	'login_a'		        => 'Sign in',
	'accept_terms'		    => 'I agree to the terms of service',
	'age' 				    => 'You must be, at least, 18 years old',
	'phone_prefix'          => 'Phone numbers with prefix 80... or 90... are not allowed',

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
	
    'accepted'             => 'The :attribute must be accepted.',
    'active_url'           => 'The :attribute is not a valid URL.',
    'after'                => 'The :attribute must be a date after :date.',
    'alpha'                => 'The :attribute may only contain letters.',
    'alpha_dash'           => 'The :attribute may only contain letters, numbers, and dashes.',
    'alpha_num'            => 'The :attribute may only contain letters and numbers.',
    'array'                => 'The :attribute must be an array.',
    'before'               => 'The :attribute must be a date before :date.',
    'between'              => [
        'numeric' => 'The :attribute must be between :min and :max.',
        'file'    => 'The :attribute must be between :min and :max kilobytes.',
        'string'  => 'The :attribute must be between :min and :max characters.',
        'array'   => 'The :attribute must have between :min and :max items.',
    ],
    'boolean'              => 'The :attribute field must be true or false.',
    'confirmed'            => 'The :attribute confirmation does not match.',
    'date'                 => 'The :attribute is not a valid date.',
    'date_format'          => 'The :attribute does not match the format dd/mm/yyyy',
    'different'            => 'The :attribute and :other must be different.',
    'digits'               => 'The :attribute must be :digits digits.',
    'digits_between'       => 'The :attribute must be between :min and :max digits.',
    'distinct'             => 'The :attribute field has a duplicate value.',
    'email'                => 'The :attribute must be a valid email address.',
    'exists'               => 'The selected :attribute is invalid.',
    'filled'               => 'The :attribute field is required.',
    'image'                => 'The :attribute must be an image.',
    'in'                   => 'The selected :attribute is invalid.',
    'in_array'             => 'The :attribute field does not exist in :other.',
    'integer'              => 'The :attribute must be an integer.',
    'ip'                   => 'The :attribute must be a valid IP address.',
    'json'                 => 'The :attribute must be a valid JSON string.',
    'max'                  => [
        'numeric' => 'The :attribute may not be greater than :max.',
        'file'    => 'The :attribute may not be greater than :max kilobytes.',
        'string'  => 'The :attribute may not be greater than :max characters.',
        'array'   => 'The :attribute may not have more than :max items.',
    ],
    'mimes'                => 'The :attribute must be a file of type: :values.',
    'min'                  => [
        'numeric' => 'The :attribute must be at least :min.',
        'file'    => 'The :attribute must be at least :min kilobytes.',
        'string'  => 'The :attribute must be at least :min characters.',
        'array'   => 'The :attribute must have at least :min items.',
    ],
    'not_in'               => 'The selected :attribute is invalid.',
    'numeric'              => 'The :attribute must be a number.',
    'present'              => 'The :attribute field must be present.',
    'regex'                => 'The :attribute format is invalid.',
    'required'             => 'The :attribute field is required.',
    'required_if'          => 'The :attribute field is required when :other is :value.',
    'required_unless'      => 'The :attribute field is required unless :other is in :values.',
    'required_with'        => 'The :attribute field is required when :values is present.',
    'required_with_all'    => 'The :attribute field is required when :values is present.',
    'required_without'     => 'The :attribute field is required when :values is not present.',
    'required_without_all' => 'The :attribute field is required when none of :values are present.',
    'same'                 => 'The :attribute and :other must match.',
    'size'                 => [
        'numeric' => 'The :attribute must be :size.',
        'file'    => 'The :attribute must be :size kilobytes.',
        'string'  => 'The :attribute must be :size characters.',
        'array'   => 'The :attribute must contain :size items.',
    ],
    'string'               => 'The :attribute must be a string.',
    'timezone'             => 'The :attribute must be a valid zone.',
    'unique'               => 'The :attribute has already been taken.',
    'url'                  => 'The :attribute format is invalid.',

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
            'required' => 'Profile image is required',
	        'max' => 'Profile image may not be greater than 2048 kilobytes',
	        'mime' => 'Profile image must be a file of type: jpeg,jpg or png',
	        'image' => 'Profile image must be an image',
        ],
	    'task' => [
	    	'messages' => [
	    		'note' => [
	    			'required' => 'In order to create a new note, the textarea field is mandatory',
				    'min' => 'The note must have, at least, 4 characters',
			    ],
			    'message' => [
				    'required' => 'In order to send a message, you must write a text with, at least, 4 characters.',
				    'min' => 'The message must have, at least, 4 characters.',
			    ],
		    ],
	    ],
	    'notifications' => [
	    	'type' => [
	    		'required' => 'You need to choose one type of notification',
		    ],
		    'user' => [
		    	'required' => 'You need to select the users who will receive the notification',
			    'choose' => 'You must select "All users" in order to send the notifications to all users, or mark the users that will receive the notification'
		    ],
		    'message' => [
		        'require' => 'You must write the message of the notification',
			    'min' => 'You must write a message with, at least, 10 characters',
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
	    'name' => 'Name',
	    'email' => 'E-Mail',
	    'phone' => 'Phone',
	    'genre' => 'Genre',
	    'birthdate' => 'Birthdate',
	    'password' => 'Password',
	    'password_confirmation' => 'Password Confirmation',
	    'code' => 'Code',

	    //PARTE TICKETS
	    'message' => 'Message',
	    'title' => 'Title',
	    'category' => 'Category',
	    'motive' => 'Motive',

    ],

];
