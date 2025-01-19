<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBlogRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string',
            'image_path' => 'required|mimes:png,jpg,npg',
            'category_id' => 'required|exists:categories,id',
            'description' => 'required',
        ];

    }
    public function messages(): array
    {
        return [
            'category_id.required' => 'A category is required',
            'image_path.required' => 'An Image is required',
        ];
    }
    public function attributes(): array
    {
        return [
            'category_id' => 'Category',
        ];
    }
}
