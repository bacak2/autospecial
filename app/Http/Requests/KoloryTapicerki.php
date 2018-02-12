<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class KoloryTapicerki extends FormRequest
{
    
    protected $fillable = ['kolor_tapicerki_code', 'kolor_tapicerki_decoded'];
    
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
            'kolor_tapicerki_code' => 'required|max:2|min:2'
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
            'kolor_tapicerki_code.required' => 'Pole Kod musi być wypełnione',
            'kolor_tapicerki_code.max' => 'Pole Kod musi mieć 2 znaki',
            'kolor_tapicerki_code.min' => 'Pole Kod musi mieć 2 znaki'
        ];
    }
}
