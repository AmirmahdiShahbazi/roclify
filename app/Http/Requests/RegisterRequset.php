<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequset extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'email'=>'required|email|unique:users,email',
            'password' => 'required|confirmed|min:6|regex:^(?=.*[A-Za-z0-9])([A-Za-z0-9_@.-])$',
            // 'remember'=>'nullable',

        ];
    }
}
