<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTestmonialRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|max:2048',
        ];
    }
    public function messages(): array
    {
        return [
            'name.required' => 'The name field is required.',
            'position.required' => 'The position field is required.',
            'description.required' => 'The description field is required.',
            'image.image' => 'The image must be a valid image file.',
            'image.max' => 'The image size must not exceed 2MB.',
        ];
    }
    public function attributes(): array
    {
        return [
            'name' => 'Name',
            'position' => 'Position',
            'description' => 'Description',
            'image' => 'Image',
        ];
    }
}
