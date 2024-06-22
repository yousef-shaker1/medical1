<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class checkorder extends FormRequest
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
            'name' => 'required|min:3|max:20',
            'email' => 'required|min:3|max:50',
            'mobile' => 'required|min:10|max:12',
            'notes' => 'required',
        ];
        
    }
    public function messages(){
        return [
            'name.required' => 'يرجي ادخال الاسم',
            'email.required' => 'يرجي ادخال الايميل',
            'mobile.required' => 'يرجي ادخال الموبايل',
            'notes.required' => 'يرجي ادخال اي ملاحظة',
            'name.min' => 'الاسم يجب ان يكون اكبر من 3 حروف',
            'name.max' => 'الاسم يجب ان يكون اصغر من 20 حروف',
            'email.max' => 'الايميل يجب ان يكون اصغر من 20 حروف',
            'email.min' => 'الايميل يجب ان يكون اكبر من 3 حروف',
        ];
    }
}
