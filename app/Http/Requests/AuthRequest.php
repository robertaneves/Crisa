<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthRequest extends FormRequest{
    
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array{
        return [
            "email"=> "required|email",
            "password" => "required"
        ];
    }

    public function messages(): array {
        return [
            'email.required' => 'Campo Email é obrigatório.',
            'email.email' => 'Necessário enviar um email válido.',
            'password.required' => 'Campo Senha é obrigatório.',
        ];
    }
}
