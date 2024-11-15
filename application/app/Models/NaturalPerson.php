<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NaturalPerson extends Model
{
    use HasFactory;

    protected $table = 'natural_person';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'person_id',
        'cpf',
        'rg',
        'birthdate'
    ];

    public function person()
    {
        return $this->belongsTo(Person::class, 'person_id', 'id');
    }

}
