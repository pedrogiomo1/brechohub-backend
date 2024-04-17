<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoriaRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            "nome"                             => "required|string",
            "categoria_id"                     => "nullable|integer|exists:categoria,id",
        ];
    }
}
