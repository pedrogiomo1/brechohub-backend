<?php

namespace App\Services;

use App\Models\Endereco;
use App\Models\Pessoa;
use App\Models\PessoaFisica;
use App\Models\PessoaJuridica;
use App\Models\Telefone;
use Illuminate\Support\Facades\Http;

class PessoaService
{
    public static function create($data)
    {
        $data['tipo_pessoa'] = isset($data['pessoa_fisica']) ? 'F' : 'J';

        $pessoa = Pessoa::create($data);

        if(isset($data['pessoa_fisica'])) {
            $pessoaFisica = new PessoaFisica($data['pessoa_fisica']);
            $pessoaFisica->pessoa()->associate($pessoa)->save();
        }
        else if(isset($data['pessoa_juridica'])) {
            $pessoaJuridica = new PessoaJuridica($data['pessoa_juridica']);
            $pessoaJuridica->pessoa()->associate($pessoa)->save();
        }

        $dadosEndereco = isset($data['endereco']) ? $data['endereco'] : [];

        $endereco = new Endereco($dadosEndereco);
        $endereco->pessoa()->associate($pessoa)->save();

        if(isset($data['telefone'])){
            foreach ($data['telefone'] as $telefoneData) {
                $telefone = new Telefone($telefoneData);
                $telefone->pessoa()->associate($pessoa)->save();
            }
        }

        return $pessoa;
    }

    public static function update($data, Pessoa $pessoa)
    {
        $pessoa->update($data);

        if(isset($data['pessoa_fisica'])) {
            $pessoa->pessoa_fisica->update($data['pessoa_fisica']);
        }
        else if(isset($data['pessoa_juridica'])) {
            $pessoa->pessoa_juridica->update($data['pessoa_juridica']);
        }

        return $pessoa;
    }

    public static function deletePessoa(Pessoa $pessoa)
    {
        $pessoa->delete();
    }

}
