<?php

namespace App\Http\Requests\Dashboard\Auth;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePasswordRequest extends FormRequest
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
            'old_password' => 'required',
            'new_password' => 'required',
            'password_confirmation' => 'required|same:new_password',
        ];
    }

    /**
     * Get custom error messages for validation rules.
     */
    public function messages(): array
    {
        return [
            'old_password.required' => 'حقل كلمة المرور القديمة مطلوب.',
            'new_password.required' => 'حقل كلمة المرور الجديدة مطلوب.',
            'password_confirmation.required' => 'يرجى تأكيد كلمة المرور الجديدة.',
            'password_confirmation.same' => 'كلمة المرور الجديدة غير متطابقة.',
        ];
    }
}
