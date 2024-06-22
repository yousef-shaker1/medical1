<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class checkcity extends FormRequest
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
            'city' => 'required|min:2|max:20', 
        ];
    }
    public function messages(){
        return [
            'city.required' => 'يرجي ادخال اسم المدينة',
            'city.min' => 'يرجي ادخال اسم اكبر من 2 حروف',
            'city.max' => 'يرجي ادخال اسم اصغر من 20 حروف',
        ];
    }
}
