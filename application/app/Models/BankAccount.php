<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BankAccount extends Model
{
    protected $table = 'account_number';
    protected $primaryKey = 'id';

    protected $fillable = [
        'person_id',
        'bank_id',
        'account_type',
        'agency_number',
        'account_number',
        'account_digit',
        'holder_name',
        'pix_type',
        'pix_key',
        'active',
    ];

    public function person()
    {
        return $this->belongsTo(Person::class, 'person_id', 'id');
    }


}
