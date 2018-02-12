<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OpcjeWyposazenia extends FormRequest
{
    
    protected $fillable = ['opcja_wyposazenia_code', 'opcja_wyposazenia_decoded', 'model_code3'];
    
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
            'opcja_wyposazenia_code' => 'required|max:3|min:3'
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
            'opcja_wyposazenia_code.required' => 'Pole Kod musi być wypełnione',
            'opcja_wyposazenia_code.max' => 'Pole Kod musi mieć 3 znaki',
            'opcja_wyposazenia_code.min' => 'Pole Kod musi mieć 3 znaki'
        ];
    }
}
