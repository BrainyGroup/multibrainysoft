<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePayeRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            
            'minimum' =>'required|numeric',

            'maximum' => 'required|numeric',
    
            'ratio' =>'required|numeric|between:0.001,0.999',
    
            'offset' => 'required|numeric',
    
            'country_id' =>'required|numeric',
            
        ];
    }
}
