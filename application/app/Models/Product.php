<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Stancl\Tenancy\Database\Concerns\BelongsToTenant;

class Product extends Model
{
    use BelongsToTenant;

    protected $table = 'product';
    protected $primaryKey = 'id';

    protected $fillable = [
        'category_id',
        'supplier_id',
        'code',
        'description',
        'sale_price',
        'commission_type',
        'commission',
        'supplier_price',
        'status',
        'image',
        'observations',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'supplier_id', 'id');
    }

    public function images()
    {
        return $this->hasMany(ProductImage::class, 'product_id', 'id');
    }

    public function variations()
    {
        //return $this->hasMany(ProductVariationItem::class, 'product_id', 'id');
    }

}
