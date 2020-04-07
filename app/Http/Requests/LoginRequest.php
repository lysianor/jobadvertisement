<?php

namespace App\Http\Requests;

use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class LoginRequest extends FormRequest
{

    public function rules()
    {
        return [
            'email' => 'required|email',
            'password' => 'required|min:8',
        ];
    }

    public function messages() {
        return [
            'email.required' => 'This field is required.',
            'email.email' => 'Email Address is not valid.',
            'password.required' => 'This field is required.',
            'password.min' => 'Password must be 8 characters or more',
        ];
    }
}
