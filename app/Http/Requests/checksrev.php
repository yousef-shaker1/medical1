<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class checksrev extends FormRequest
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
            'serv_name' => 'required|min:2|max:20', 
        ];
    }
    public function messages(){
        return [
            'serv_name.required' => 'يرجي ادخال اسم الخدمة',
            'serv_name.min' => 'يرجي ادخال اسم اكبر من 2 حروف',
            'serv_name.max' => 'يرجي ادخال اسم اصغر من 20 حروف',
        ];
    }
}
