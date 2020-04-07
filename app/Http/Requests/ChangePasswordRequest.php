<?php

namespace App\Http\Requests;

use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class ChangePasswordRequest extends FormRequest
{

    public function rules()
    {
        return [
            'old_password' => 'required',
            'password' => 'required|confirmed|min:8',
        ];
    }

    public function messages() {
        return [
            'old_password.required' => 'This field is required.',
            'password.required' => 'This field is required.',
            'password.confirmed' => 'Password confirmation does not match.',
            'password.min' => 'Password must be 8 characters or more',
        ];
    }
}
