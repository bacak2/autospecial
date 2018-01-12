<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class KoloryLakieru extends FormRequest
{
    
    protected $fillable = ['kolor_lakieru_code', 'kolor_lakieru_decoded'];
    
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
            'kolor_lakieru_code' => 'required|max:4|min:4'
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
            'kolor_lakieru_code.required' => 'Pole Kod musi być wypełnione',
            'kolor_lakieru_code.max' => 'Pole Kod musi mieć 4 znaki',
            'kolor_lakieru_code.min' => 'Pole Kod musi mieć 4 znaki'
        ];
    }
}
