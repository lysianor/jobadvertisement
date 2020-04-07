<?php

namespace App\Http\Requests;

use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdateCompanyInfoRequest extends FormRequest
{

    public function rules()
    {
        return [
            'name' => 'required',
            'company' => 'required',
            'phone' => 'required|numeric',
            'website' => 'required',
            'image' => 'required|image',
            'address' => 'required',
        ];
    }

    public function messages() {
        return [
            'name.required' => 'This field is required',
            'company.required' => 'This field is required',
            'phone.required' => 'This field is required',
            'phone.numeric' => 'Contact Number is not valid',
            'website.required' => 'This field is required',
            'image' => 'required|image',
            'address.required' => 'This field is required',
        ];
    }
}
