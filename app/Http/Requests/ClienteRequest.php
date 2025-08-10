<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use function PHPUnit\Framework\returnSelf;

class ClienteRequest extends FormRequest{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool{
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array{
        return [
            'name' => 'required',
            'email' => 'required|email',
            'telefone' => 'required',
            'cpf' => 'required',
            'password' => 'required|min:6',
            'password_confirmation' => 'required|min:6',
            'cep' => 'required',
            'rua' => 'required',
            'complemento' => 'required',
            'bairro' => 'required',
            'cidade' => 'required',
            'estado' => 'required'
        ];
    }

    public function messages(): array {
        return[
            'name.required' => 'Campo nome é obrigatório.', 
            'email.required' => 'Campo email é obrigatório.', 
            'email.email' => 'Campo email precisar ser válido.', 
            'telefone.required' => 'Campo telefone é obrigatório.', 
            'cpf.required' => 'Campo CPF é obrigatório.', 
            'password.required' => 'Campo senha é obrigatório.', 
            'password.min' => 'É necessário no mínimo :min caractéres.',
            'password_confirmation.required' => 'Campo senha é obrigatório.', 
            'password_confirmation.min' => 'É necessário no mínimo :min caractéres.',
            'cep.required' => 'Campo CEP é obrigatório.', 
            'rua.required' => 'Campo rua é obrigatório.', 
            'complemento.required' => 'Campo complemento é obrigatório.', 
            'bairro.required' => 'Campo bairro é obrigatório.', 
            'cidade.required' => 'Campo cidade é obrigatório.', 
            'estado.required' => 'Campo estado é obrigatório.', 
        ];
    }
}
