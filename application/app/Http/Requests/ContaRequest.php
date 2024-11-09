<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContaRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            "pessoa_id"                => "required|integer|exists:pessoa,id",
            "banco_id"                 => "required|integer|exists:banco,id",
            "tipo_conta"               => "required|integer",
            "agencia"                  => "required",
            "conta"                    => "required",
            "titular"                  => "required",
        ];
    }
}
