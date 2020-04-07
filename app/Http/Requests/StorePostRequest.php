<?php

namespace App\Http\Requests;

use App\Post;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StorePostRequest extends FormRequest
{

    public function rules()
    {
        return [
            'title' => 'required',
            'body' => 'required|min:10',
            'categories' => 'required',
            'salary' => 'required|numeric',
            'address' => 'required',
        ];
    }

    public function messages() {
        return [
            'title.required' => 'This field is required.',
            'categories.required' => 'This field is required.',
            'body.required' => 'This field is required.',
            'body.min' => 'Must be 10 characters or more.',
            'salary.required' => 'This field is required.',
            'salary.numeric' => 'Must be a number.',
            'address.required' => 'This field is required.',
        ];
    }
}
