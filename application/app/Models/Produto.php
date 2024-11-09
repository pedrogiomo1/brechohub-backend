<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Stancl\Tenancy\Database\Concerns\BelongsToTenant;

class Produto extends Model
{
    use BelongsToTenant;

    protected $table = 'produto';
    protected $primaryKey = 'id';

    protected $fillable = [
        'categoria_id',
        'fornecedor_id',
        'codigo',
        'descricao',
        'preco_venda',
        'tipo_comissao',
        'comissao',
        'valor_fornecedor',
        'status',
        'imagem',
        'observ',
    ];
}
