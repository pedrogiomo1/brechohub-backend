<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PessoaJuridica extends Model
{
    use HasFactory;

    protected $table = 'pessoa_juridica';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'cnpj',
        'razao_social',
        'inscricao_estadual',
        'pessoa_id'
    ];


    public function pessoa()
    {
        return $this->belongsTo(Pessoa::class, 'pessoa_id', 'id');
    }

}
