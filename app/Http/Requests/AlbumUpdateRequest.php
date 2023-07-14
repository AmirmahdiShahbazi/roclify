<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AlbumUpdateRequest extends FormRequest
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
            'album-name'=>'required|string|min:3|unique:albums,name,'.$this->get('album-id'),
            'album-bio'=>'required|string',
            'album-image'=>'nullable|image',
            'album-thumbnail'=>'nullable|image',
            'album-link'=>'required|string',   
            'album-band'=>'required|exists:albums,name'         

        ];    }
}
