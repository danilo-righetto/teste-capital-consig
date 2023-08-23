<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'nome' => ['required', 'min:3'],
            'email' => ['required', 'email'],
            'cpf' => ['required', 'min:3', 'max:14'],
            'data_nascimento' => ['required', 'min:3'],
            'rua' => ['required', 'min:3'],
            'cep' => ['required', 'min:5', 'max:9'],
            'cidade' => ['required', 'min:3'],
            'estado' => ['required', 'max:2'],
            'ativo' => ['required', 'boolean'],
        ];
    }

    public function messages()
    {
        return [
            'nome.required' => 'O campo nome é obrigatório',
            'email.required' => 'O campo email é obrigatório',
            'cpf.required' => 'O campo nome é obrigatório',
            'data_nascimento.required' => 'O campo nome é obrigatório',
            'rua.required' => 'O campo nome é obrigatório',
            'cep.required' => 'O campo nome é obrigatório',
            'cidade.required' => 'O campo nome é obrigatório',
            'estado.required' => 'O campo nome é obrigatório',
            'ativo.required' => 'O campo nome é obrigatório'
        ];
    }
}
