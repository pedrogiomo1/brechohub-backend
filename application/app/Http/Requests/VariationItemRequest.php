<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VariationItemRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            "name"                  => "required|string",
            "variation_id"           => "required|integer|exists:variation,id",
        ];
    }
}
