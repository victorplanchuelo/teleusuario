<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterUserApplicationRequest extends FormRequest
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
	        'name' => 'required|max:100',
	        'email' => 'required|email',
	        'phone' => 'required|max:9|numeric|regex:/(6)[0-9]{8}/',
	        'birthdate' => 'required|date|date_format:d/m/Y',

        ];
    }
}
