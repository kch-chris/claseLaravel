<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientsRequest extends FormRequest
{
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
            'name' => 'required|max:100',
            'lastname' => 'required|max:100',
            'email' => 'required|email|max:250',
            'phone' => 'required|max:15',
            'age' => 'required|max:10',
            'sex' => 'required|max:10',
            'credit' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'El nombre es requerido',
            'name.max' => 'El tamaño del nombre debe ser menor de 100 caracteres'
        ];
    }
}
