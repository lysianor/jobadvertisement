<?php

namespace App\Http\Requests;

use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;
use App\Rules\Captcha;


class RegisterRequest extends FormRequest
{

    public function rules()
    {
        return [
            'company' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'g-recaptcha-response' => new Captcha(),
        ];
    }

    public function messages() {
        return [
            'company.required' => 'This field is required.',
            'name.required' => 'This field is required.',
            'email.required' => 'This field is required.',
            'email.email' => 'Email Address is not valid.',
            'password.required' => 'This field is required.',
            'password.confirmed' => 'Password confirmation does not match.',
            'password.min' => 'Password must be 8 characters or more',
        ];
    }
}
