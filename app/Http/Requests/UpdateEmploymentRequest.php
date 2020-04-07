<?php

namespace App\Http\Requests;

use App\Post;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdateEmploymentRequest extends FormRequest
{

    public function rules()
    {
        return [
            'name' => 'required|unique:employments|min:3',
        ];
    }

    public function messages() {
        return [
            'name.required' => 'This field is required.',
            'name.unique' => 'Already taken.',
            'name.min' => 'Must be 3 characters or more',
        ];
    }
}
