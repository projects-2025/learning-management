<?php

namespace App\Http\Requests\Dashboard\Institution;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true; // Change to true to allow validation
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name'    => ['required', 'string', 'max:100', 'unique:institutions,name'],
            'phone'   => ['required', 'regex:/^(\+?\d{1,3}[- ]?)?\d{10}$/', 'unique:institutions,phone'],
            'address' => ['required', 'string', 'max:500'],
            'email'   => ['nullable', 'email', 'max:100', 'unique:institutions,email'],
            'website' => ['nullable', 'url', 'max:255'],
            'stages' => ['required','array'],
            'stages.*' => ['exists:stages,id']
        ];
    }

    /**
     * Custom error messages for validation.
     */
    public function messages()
    {
        return [
            'name.required'    => 'الاسم مطلوب.',
            'name.string'      => 'يجب أن يكون الاسم نصًا.',
            'name.max'         => 'يجب ألا يزيد الاسم عن 100 حرفًا.',
            'name.unique'      => 'هذا الاسم مستخدم بالفعل.',

            'phone.required'   => 'رقم الجوال مطلوب.',
            'phone.regex'      => 'رقم الجوال غير صحيح. يجب أن يتكون من 10 أرقام على الأقل.',
            'phone.unique'     => 'رقم الجوال مستخدم بالفعل.',

            'address.required' => 'العنوان مطلوب.',
            'address.string'   => 'يجب أن يكون العنوان نصًا.',
            'address.max'      => 'يجب ألا يزيد العنوان عن 500 حرفًا.',

            'email.email'      => 'يجب إدخال بريد إلكتروني صحيح.',
            'email.max'        => 'يجب ألا يزيد البريد الإلكتروني عن 100 حرفًا.',
            'email.unique'     => 'هذا البريد الإلكتروني مستخدم بالفعل.',

            'website.url'      => 'يجب إدخال رابط صحيح.',
            'website.max'      => 'يجب ألا يزيد الرابط عن 255 حرفًا.',
        ];
    }
}
