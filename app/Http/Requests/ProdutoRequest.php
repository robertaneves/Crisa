<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProdutoRequest extends FormRequest
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
    public function rules(): array{
    return [
        "nome" => "required|string|max:255",
        "preco" => "required|numeric|min:0",
        "tamanho" => "required|in:P,M,G,GG,G1,G2,G3,Outro,Único",
        "descricao" => "nullable|string",
        "quantidade" => "required|integer|min:0",
        "ativo" => "sometimes|boolean",
        "categorias" => 'nullable|array',
        "categorias.*" => 'exists:categoria,id'
    ];
}

}
