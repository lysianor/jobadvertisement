<?php

namespace App\Http\Requests;

use App\User;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdatePasswordRequest extends FormRequest
{

    public function rules()
    {
        return [
            'old_password' => 'required|different:password|min:8',
            'password' => 'required|confirmed',
            
        ];
    }

    public function messages() {
        return [
            'old_password.required' => 'This field is required.',
            'old_password.different' => 'Cannot be the same as old password.',
            'old_password.min' => 'Must be 8 characters or more',
            'password.required' => 'This field is required.',
            'password.confirmed' => 'The password does not match.'
            
        ];
    }
}
