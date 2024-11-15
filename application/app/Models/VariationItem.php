<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Stancl\Tenancy\Database\Concerns\BelongsToTenant;

class VariationItem extends Model
{

    protected $table = 'variation_item';
    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
        'variation_id',
        'order',
    ];

    protected static function booted(): void
    {
        parent::booted();

        static::creating(function ($variationItem) {
            $variationItem->order = VariationItem::where('variation_id', $variationItem->variation_id)->max('order') + 1;
        });
    }

}
