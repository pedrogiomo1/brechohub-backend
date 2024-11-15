<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanyRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    protected function prepareForValidation()
    {
        $data = $this->all();

        if(isset($data['address'])){
            $data['address']['postal_code'] = preg_replace('/\D/', '', $data['address']['postal_code']);
        }
        if(isset($data['natural_person'])){
            $data['natural_person']['cpf'] = preg_replace('/\D/', '', $data['natural_person']['cpf']);
        }
        if(isset($data['company_person'])){
            $data['company_person']['cnpj'] = preg_replace('/\D/', '', $data['company_person']['cnpj']);
        }

        $this->merge($data);
    }

    public function rules(): array
    {
        return [
            "name"                            => "required|string",
            "company_person.cnpj"             => "required|string",
            "company_person.business_name"    => "required|string",
            "address.postal_code"             => "nullable",

        ];
    }
}
