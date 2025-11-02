<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSettingRequest extends FormRequest
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
            'address'   => 'required|string|max:255',
            'phone'     => 'required|string|max:20',
            'email'     => 'required|email|max:255',

            'instegram' => 'nullable|url|max:255',
            'twitter'   => 'nullable|url|max:255',
            'facebook'  => 'nullable|url|max:255',
            'linkedin'  => 'nullable|url|max:255',
            'youtube'   => 'nullable|url|max:255',

        ];
    }
    public function messages(): array
    {
        return [
            'email.email' => 'برجاء إدخال بريد إلكتروني صالح.',
            'url' => 'برجاء إدخال رابط صحيح يبدأ بـ http أو https.',
        ];
    }
    public function attributes(): array
    {
        return [
            'address'   => 'Address',
            'phone'     => 'Phone Number',
            'email'     => 'Email Address',
            'instegram' => 'Instagram Link',
            'twitter'   => 'Twitter Link',
            'facebook'  => 'Facebook Link',
            'linkedin'  => 'LinkedIn Link',
            'youtube'   => 'YouTube Link',
        ];
    }
}
