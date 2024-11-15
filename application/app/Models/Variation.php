<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Stancl\Tenancy\Database\Concerns\BelongsToTenant;

class Variation extends Model
{
    use BelongsToTenant;

    protected $table = 'variation';
    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
    ];

    public function items()
    {
        return $this->hasMany(VariationItem::class, 'variation_id', 'id');
    }
}
