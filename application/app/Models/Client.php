<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Stancl\Tenancy\Database\Concerns\BelongsToTenant;

class Client extends Model
{
    use BelongsToTenant;

    protected $table = 'client';
    protected $primaryKey = 'id';
    protected $fillable = [
        'person_id',
        'company_id',
    ];

    public function person()
    {
        return $this->belongsTo(Person::class, 'person_id', 'id');
    }
}
