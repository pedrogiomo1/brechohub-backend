<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            "code"                     => "nullable",
            "description"              => "required|string",
            "category_id"              => "required|integer|exists:category,id",
            "supplier_id"              => "required|integer|exists:supplier,id",
            "sale_price"               => "required",
            "commission_type"          => "nullable",
            "commission"               => "nullable",
            "supplier_price"           => "nullable",
            "status"                   => "nullable",
        ];
    }
}
