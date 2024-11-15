<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Stancl\Tenancy\Database\Concerns\BelongsToTenant;

class Category extends Model
{
    use BelongsToTenant;

    protected $table = 'category';
    protected $primaryKey = 'id';
    protected $fillable = ['name','category_id'];


    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function subcategories()
    {
        return $this->hasMany(Category::class, 'category_id', 'id');
    }

}
