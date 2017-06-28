<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SendMessageRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
	        'texto' => 'required|min:4',
        ];
    }

    public function messages()
    {
		return [
			'texto.required' => trans('validation.custom.task.messages.message.required'),
			'texto.min' => trans('validation.custom.task.messages.message.min'),
		];
    }

    public function response(array $errors)
    {
	    $response = [
		    'success' => 0,
		    'error' => $errors
	    ];

	    return response($response);
    }
}
