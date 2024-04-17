<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FornecedorRequest extends FormRequest
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

        $this->merge($data);
    }

    public function rules(): array
    {
        return [
            "nome"                             => "required|string",
            "pessoa_fisica.data_nascimento"    => "nullable|string",
            "pessoa_fisica.cpf"                => "nullable|string",
            "endereco.cep"                     => "nullable",
        ];
    }
}
