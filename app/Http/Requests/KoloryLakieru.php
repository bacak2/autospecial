<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class KoloryLakieru extends FormRequest
{
    
    protected $fillable = ['code', 'decoded'];
    
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
            'code' => 'required|max:4|min:4'
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
            'code.required' => 'Pole Kod musi być wypełnione',
            'code.max' => 'Pole Kod musi mieć 4 znaki',
            'code.min' => 'Pole Kod musi mieć 4 znaki'
        ];
    }
}
