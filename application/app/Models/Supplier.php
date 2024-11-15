<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Stancl\Tenancy\Database\Concerns\BelongsToTenant;

class Supplier extends Model
{
    use BelongsToTenant;

    protected $table = 'supplier';
    protected $primaryKey = 'id';

    protected $fillable = [
        'person_id',
        'active',
        'comission_tipo',
        'comission',
        'observations',
    ];

    public function person()
    {
        return $this->belongsTo(Person::class, 'person_id', 'id');
    }

}
