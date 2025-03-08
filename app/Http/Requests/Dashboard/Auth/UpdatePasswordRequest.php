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
            'old_password' => ['required', 'current_password:admin'], 
            'new_password' => ['required', 'string', 'min:8', 'confirmed', 'different:old_password'],
        ];
    }

    /**
     * Get custom error messages for validation rules.
     */
    public function messages(): array
    {
        return [
            'old_password.required' => 'حقل كلمة المرور القديمة مطلوب.',
            'old_password.current_password' => 'كلمة المرور القديمة غير صحيحة.',
            'new_password.required' => 'حقل كلمة المرور الجديدة مطلوب.',
            'new_password.min' => 'يجب أن تحتوي كلمة المرور الجديدة على 8 أحرف على الأقل.',
            'new_password.different' => 'يجب أن تكون كلمة المرور الجديدة مختلفة عن القديمة.',
            'new_password.confirmed' => 'تأكيد كلمة المرور غير متطابق.',
        ];
    }


    /**
     * Add custom validation logic.
     */
    // public function withValidator($validator)
    // {
    //     $validator->after(function ($validator) {
    //         $admin = Auth::guard('admin')->user();

    //         if (!Hash::check($this->old_password, $admin->password)) {
    //             $validator->errors()->add('old_password', 'كلمة المرور القديمة غير صحيحة.');
    //         }
    //     });
    // }
}
