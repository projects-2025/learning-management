<?php

namespace App\Http\Requests\Dashboard\Institution;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
        $institutionId = $this->route('institution'); // Get the institution ID from the route

        return [
            'name'    => ['required', 'string', 'max:100', "unique:institutions,name,{$institutionId}"],
            'phone'   => ['required', 'regex:/^(\+?\d{1,3}[- ]?)?\d{10}$/', "unique:institutions,phone,{$institutionId}"],
            'address' => ['required', 'string', 'max:500'],
            'email'   => ['nullable', 'email', 'max:100', "unique:institutions,email,{$institutionId}"],
            'website' => ['nullable', 'url', 'max:255'],
            'stages'  => ['required', 'array'],
            'stages.*'=> ['exists:stages,id'],
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

            'stages.required'  => 'يجب اختيار مرحلة دراسية واحدة على الأقل.',
            'stages.array'     => 'يجب أن تكون المراحل الدراسية في شكل قائمة.',
            'stages.*.exists'  => 'إحدى المراحل المختارة غير موجودة.',
        ];
    }
}
