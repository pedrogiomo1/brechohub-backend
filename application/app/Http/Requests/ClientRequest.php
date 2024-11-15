<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientRequest extends FormRequest
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

        $this->merge($data);
    }

    public function rules(): array
    {
        return [
            "name"                             => "required|string",
            "natural_person.birthdate"         => "nullable|date",
            "natural_person.cpf"               => "nullable|string",
            "address.postal_code"              => "nullable",
        ];
    }
}
