<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
	        'name' => 'required|max:100|regex:/^[\pL\s\-]+$/u',
	        'email' => 'required|email|unique:users',
	        'phone' => 'required|size:9|regex:/[6789][0-9]{8}/|phone_prefix',
	        'genre' => 'required',
	        'birthdate' => 'required|date|age',
	        'password' => 'required|min:6|regex:/(^[A-Za-z0-9]+$)+/|confirmed',
	        'password_confirmation' => 'required|min:6|regex:/(^[A-Za-z0-9]+$)+/',
        ];
    }
}
