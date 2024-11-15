<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{
    use HasFactory;

    protected $table = 'phone';
    protected $primaryKey = 'id';

    protected $fillable = [
        'number',
        'person_id'
    ];

    protected function number(): Attribute
    {
        return Attribute::make(
            set: fn($value) => preg_replace('/[^0-9]/', '', $value),
        );
    }

    public function person()
    {
        return $this->belongsTo(Person::class, 'person_id', 'id');
    }

}
