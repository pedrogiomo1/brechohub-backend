<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Stancl\Tenancy\Database\Concerns\BelongsToTenant;

class Cliente extends Model
{
    use BelongsToTenant;

    protected $table = 'cliente';
    protected $primaryKey = 'id';
    protected $fillable = [
        'pessoa_id',
        'empresa_id',
    ];

    public function pessoa()
    {
        return $this->belongsTo(Pessoa::class, 'pessoa_id', 'id');
    }
}
