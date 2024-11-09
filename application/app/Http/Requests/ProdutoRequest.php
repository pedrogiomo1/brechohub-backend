<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProdutoRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            "codigo"                   => "nullable",
            "descricao"                => "required|string",
            "categoria_id"             => "required|integer|exists:categoria,id",
            "fornecedor_id"            => "required|integer|exists:fornecedor,id",
            "preco_venda"              => "required",
            "tipo_comissao"            => "nullable",
            "comissao"                 => "nullable",
            "valor_fornecedor"         => "nullable",
            "status"                   => "nullable",
        ];
    }
}
