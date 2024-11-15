<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    use HasFactory;

    protected $table = 'person';
    protected $primaryKey = 'id';

    protected $fillable = [
        'nome',
        'email',
        'tipo_person',
    ];

    public function natural_person()
    {
        return $this->hasOne(NaturalPerson::class, 'person_id', 'id');
    }

    public function company_person()
    {
        return $this->hasOne(CompanyPerson::class, 'person_id', 'id');
    }

    public function address()
    {
        return $this->hasOne(Address::class, 'person_id', 'id');
    }

    public function phones()
    {
        return $this->hasMany(Phone::class, 'person_id', 'id');
    }

    public function company(){
        return $this->hasOne(company::class, 'person_id', 'id');
    }

    public function client(){
        return $this->hasOne(Client::class, 'person_id', 'id');
    }

    public function supplier(){
        return $this->hasOne(Supplier::class, 'person_id', 'id');
    }

    public function user(){
        return $this->hasOne(User::class, 'person_id', 'id');
    }

    public function account_number()
    {
        return $this->hasMany(BankAccount::class, 'person_id', 'id');
    }

}
