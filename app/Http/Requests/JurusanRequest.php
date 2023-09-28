<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class JurusanRequest extends FormRequest
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
            'name' => 'string',
            'image1' => 'image|mimes:jpg,jpeg,png,svg|max:2048',
            'image2' => 'image|mimes:jpg,jpeg,png,svg|max:2048',
            'image3' => 'image|mimes:jpg,jpeg,png,svg|max:2048',
            'keterangan' => 'string',
        ];
    }
}
