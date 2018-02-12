<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Modele extends FormRequest
{
    protected $fillable = ['model_code', 'model_decoded', 'model_code3'];
    
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() 
    {
        return [
            'model_code' => 'required|max:6|min:6'
        ];
    }
    
    /**
     * Set errors message.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'model_code.required' => 'Pole Kod musi być wypełnione',
            'model_code.max' => 'Pole Kod musi mieć 6 znaków',
            'model_code.min' => 'Pole Kod musi mieć 6 znaków'
        ];
    }
}
