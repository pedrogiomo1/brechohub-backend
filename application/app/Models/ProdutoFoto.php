<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProdutoFoto extends Model
{
    use HasFactory;

    protected $table = 'produto_foto';
    protected $primaryKey = 'id';

    protected $fillable = [
        'produto_id',
        'arquivo',
    ];
}
