<?php

namespace App\Http\Requests\Recruitment\Admin;

use Illuminate\Foundation\Http\FormRequest;

class RecruitmentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'full_name' => 'required',
            'phone' => 'required',
            'education' => 'required',
            'job_position' => 'required',
            'address' => 'required',
            'collaboration_type' => 'required',
            'file' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'full_name.required' => 'تکمیل فیلد نام کامل اجباریست',
            'phone.required' => 'تکمیل فیلد شماره تماس اجباریست',
            'education.required' => 'تکمیل فیلد تحصیلات اجباریست',
            'job_position.required' => 'تکمیل فیلد شغل مورد درخواست اجباریست',
            'address.required' => 'تکمیل آدرس ییییی اجباریست',
            'collaboration_type.required' => 'تکمیل فیلد ییییی نوع همکاری',
            'file.required' => 'تکمیل فیلد فایل رزومه اجباریست',
        ];
    }
}
