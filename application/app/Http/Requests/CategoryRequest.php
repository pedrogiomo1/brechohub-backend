<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            "name"                            => "required|string",
            "category_id"                     => "nullable|integer|exists:category,id",
        ];
    }
}
