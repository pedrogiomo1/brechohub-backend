<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $table = 'address';
    protected $primaryKey = 'id';

    protected $fillable = [
        'postal_code',
        'address',
        'number',
        'complement',
        'neighborhood',
        'city',
        'state',
    ];

    public function person()
    {
        return $this->belongsTo(Person::class, 'person_id', 'id');
    }

}
