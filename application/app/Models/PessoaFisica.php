<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PessoaFisica extends Model
{
    use HasFactory;

    protected $table = 'pessoa_fisica';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'pessoa_id',
        'cpf',
        'rg',
        'data_nascimento'
    ];

    public function pessoa()
    {
        return $this->belongsTo(Pessoa::class, 'pessoa_id', 'id');
    }

}
