<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Conta extends Model
{
    protected $table = 'conta';
    protected $primaryKey = 'id';

    protected $fillable = [
        'pessoa_id',
        'banco_id',
        'tipo_conta',
        'agencia',
        'conta',
        'digito',
        'titular',
        'chave_pix_tipo',
        'chave_pix',
        'ativo',
    ];

    public function pessoa()
    {
        return $this->belongsTo(Pessoa::class, 'pessoa_id', 'id');
    }


}
