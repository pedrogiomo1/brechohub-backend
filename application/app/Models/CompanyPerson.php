<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyPerson extends Model
{
    use HasFactory;

    protected $table = 'company_person';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'cnpj',
        'business_name',
        'state_registration',
        'person_id'
    ];


    public function person()
    {
        return $this->belongsTo(Person::class, 'person_id', 'id');
    }

}
