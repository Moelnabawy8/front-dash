<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreServiceRequest extends FormRequest
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
            'icon' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ];
    }
    public function messages(): array
    {
        return [
            'icon.required' => __('The icon field is required.'),
            'icon.string' => __('The icon must be a string.'),
            'icon.max' => __('The icon may not be greater than :max characters.'),
            'title.required' => __('The title field is required.'),
            'title.string' => __('The title must be a string.'),
            'title.max' => __('The title may not be greater than :max characters.'),
            'description.required' => __('The description field is required.'),
            'description.string' => __('The description must be a string.'),
        ];
    }
    public function attributes(): array
    {
        return [
            'icon' => __('keywords.Icon'),
            'title' => __('keywords.Title'),
            'description' => __('keywords.Description'),
        ];
    }
}
