<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Stancl\Tenancy\Database\Concerns\BelongsToTenant;

class Fornecedor extends Model
{
    use BelongsToTenant;

    protected $table = 'fornecedor';
    protected $primaryKey = 'id';

    protected $fillable = [
        'pessoa_id',
        'ativo',
        'tipo_comissao',
        'comissao',
        'observ',
    ];

    public function pessoa()
    {
        return $this->belongsTo(Pessoa::class, 'pessoa_id', 'id');
    }

}
