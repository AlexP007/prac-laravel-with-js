<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserTokenRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'email:rfc,dns',
            'password' => 'required|confirmed|min:10',
        ];
    }
}
