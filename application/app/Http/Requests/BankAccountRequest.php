<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BankAccountRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            "person_id"                => "required|integer|exists:person,id",
            "bank_id"                  => "required|integer|exists:bank,id",
            "account_type"             => "required|integer",
            "agency_number"            => "required",
            "account_number"            => "required",
            "holder_name"              => "required",
        ];
    }
}
