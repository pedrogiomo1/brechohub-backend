<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Stancl\Tenancy\Contracts\TenantWithDatabase;
use Stancl\Tenancy\Database\Concerns\BelongsToTenant;
use Stancl\Tenancy\Database\Concerns\HasDatabase;
use Stancl\Tenancy\Database\Concerns\HasDomains;
use Stancl\Tenancy\Database\Models\Tenant as BaseTenant;

class Company extends Model
{

    use BelongsToTenant;


    protected $table = 'company';
    protected $primaryKey = 'id';

    protected $fillable = [
        'person_id',
        'tenant_id',
    ];

    public function person()
    {
        return $this->belongsTo(Person::class, 'person_id', 'id');
    }

    public function tenant()
    {
        return $this->belongsTo(Tenant::class, 'tenant_id', 'id');
    }

}
