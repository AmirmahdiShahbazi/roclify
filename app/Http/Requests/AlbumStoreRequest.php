<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AlbumStoreRequest extends FormRequest
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
            'album-name'=>'required|string|min:3|',
            'album-bio'=>'required|string|min:20',
            'album-thumbnail'=>'required|image',
            'album-image'=>'required|',
            'album-link'=>'required|string',
            'album-band'=>'required|string'
        ];
    }
}
