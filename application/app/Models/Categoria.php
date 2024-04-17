<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Stancl\Tenancy\Database\Concerns\BelongsToTenant;

class Categoria extends Model
{
    use BelongsToTenant;

    protected $table = 'categoria';
    protected $primaryKey = 'id';
    protected $fillable = ['nome','categoria_id'];


    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'categoria_id', 'id');
    }

    public function subcategorias()
    {
        return $this->hasMany(Categoria::class, 'categoria_id', 'id');
    }

}
