<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmpresaRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    protected function prepareForValidation()
    {
        $data = $this->all();

        if(isset($data['endereco'])){
            $data['endereco']['cep'] = preg_replace('/\D/', '', $data['endereco']['cep']);
        }
        if(isset($data['pessoa_fisica'])){
            $data['pessoa_fisica']['cpf'] = preg_replace('/\D/', '', $data['pessoa_fisica']['cpf']);
        }
        if(isset($data['pessoa_juridica'])){
            $data['pessoa_juridica']['cnpj'] = preg_replace('/\D/', '', $data['pessoa_juridica']['cnpj']);
        }

        $this->merge($data);
    }

    public function rules(): array
    {
        return [
            "nome"                           => "required|string",
            "pessoa_juridica.cnpj"           => "required|string",
            "pessoa_juridica.razao_social"   => "required|string",
            "endereco.cep"                   => "nullable",

        ];
    }
}
