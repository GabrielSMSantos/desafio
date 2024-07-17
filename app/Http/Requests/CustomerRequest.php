<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class CustomerRequest extends FormRequest
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
        session()->flash('status', 'warning');
        session()->flash('message', 'Atenção, Campos inválidos!');
        return [
            'cpf'   => [
                        'required',
                        isset($this->request->all()["id"]) ? Rule::unique('customers')->ignore($this->request->all()["id"]) : 'unique:customers',
                        'cpf'
                    ],
            'name'       => 'required',
            'lastname'   => 'required',
            'birth_date' => 'required|date|before_or_equal:2009-12-31',
            'email'      => 'required|email:rfc,dns',
            'gender'     => 'required'
        ];
    }

    public function messages(): array
    {
        return [
            'cpf.required' => 'Este campo é obrigatório!',
            'cpf.unique' => 'CPF já cadastrado!',
            'cpf.cpf' => 'Informe um CPF válido!',

            'name.required' => 'Este campo é obrigatório!',
            'lastname.required' => 'Este campo é obrigatório!',

            'birth_date.required' => 'Este campo é obrigatório!',
            'birth_date.date' => 'Informe uma data válida!',
            'birth_date.before_or_equal' => 'Informe uma data que seja menor ou igual a 31/12/2009',

            'email.required' => 'Este campo é obrigatório!',
            'email.email' => 'Informe um E-mail válido!',
            'gender.required' => 'Este campo é obrigatório!',
        ];
    }
}
