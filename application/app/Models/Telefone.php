<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Telefone extends Model
{
    use HasFactory;

    protected $table = 'telefone';
    protected $primaryKey = 'id';

    protected $fillable = [
        'numero',
        'pessoa_id'
    ];

    protected function numero(): Attribute
    {
        return Attribute::make(
            set: fn($value) => preg_replace('/[^0-9]/', '', $value),
        );
    }

    public function pessoa()
    {
        return $this->belongsTo(Pessoa::class, 'pessoa_id', 'id');
    }

}
