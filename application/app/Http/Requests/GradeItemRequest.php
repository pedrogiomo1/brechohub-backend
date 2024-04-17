<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GradeItemRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            "nome"               => "required|string",
            "grade_id"           => "required|integer|exists:grade,id",
        ];
    }
}
