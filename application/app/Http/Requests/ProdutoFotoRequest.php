<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProdutoFotoRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            "produto_id"             => "required|integer|exists:produto,id",
            "arquivo_upload"         => "required",
        ];
    }
}
