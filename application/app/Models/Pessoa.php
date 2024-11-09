<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pessoa extends Model
{
    use HasFactory;

    protected $table = 'pessoa';
    protected $primaryKey = 'id';

    protected $fillable = [
        'nome',
        'email',
        'tipo_pessoa',
    ];

    public function pessoa_fisica()
    {
        return $this->hasOne(PessoaFisica::class, 'pessoa_id', 'id');
    }

    public function pessoa_juridica()
    {
        return $this->hasOne(PessoaJuridica::class, 'pessoa_id', 'id');
    }

    public function endereco()
    {
        return $this->hasOne(Endereco::class, 'pessoa_id', 'id');
    }

    public function telefones()
    {
        return $this->hasMany(Telefone::class, 'pessoa_id', 'id');
    }

    public function empresa(){
        return $this->hasOne(Empresa::class, 'pessoa_id', 'id');
    }

    public function cliente(){
        return $this->hasOne(Cliente::class, 'pessoa_id', 'id');
    }

    public function fornecedor(){
        return $this->hasOne(Fornecedor::class, 'pessoa_id', 'id');
    }

    public function usuario(){
        return $this->hasOne(Usuario::class, 'pessoa_id', 'id');
    }

    public function conta()
    {
        return $this->hasMany(Conta::class, 'pessoa_id', 'id');
    }

}
