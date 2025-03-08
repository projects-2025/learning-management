<?php

namespace App\Http\Requests\Dashboard\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UpdateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $adminId = $this->route('id');

        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', Rule::unique('admins', 'email')->ignore($this->route('admin'))],
            'old_password' => ['nullable', 'string', 'min:8'],
            'new_password' => ['nullable', 'string', 'min:8', 'confirmed'],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'الاسم مطلوب',
            'email.required' => 'البريد الإلكتروني مطلوب',
            'email.email' => 'يجب إدخال بريد إلكتروني صالح',
            'email.unique' => 'هذا البريد الإلكتروني مسجل بالفعل',
            'old_password.min' => 'يجب أن تكون كلمة المرور القديمة على الأقل 8 أحرف',
            'new_password.min' => 'يجب أن تكون كلمة المرور الجديدة على الأقل 8 أحرف',
            'new_password.confirmed' => 'تأكيد كلمة المرور غير متطابق',
        ];
    }

    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            if ($this->filled('new_password') && !Hash::check($this->old_password, Auth::user()->password)) {
                $validator->errors()->add('old_password', 'كلمة المرور القديمة غير صحيحة.');
            }
        });
    }
}
