<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BandStoreRequest extends FormRequest
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
            'band-name'=>'required|string|min:3|unique:bands,name',
            'band-bio'=>'required|string|min:20',
            'band-thumbnail'=>'required|image',
            'band-image'=>'required|image',
            

        ];
    }
}
