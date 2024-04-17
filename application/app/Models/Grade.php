<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Stancl\Tenancy\Database\Concerns\BelongsToTenant;

class Grade extends Model
{
    use BelongsToTenant;

    protected $table = 'grade';
    protected $primaryKey = 'id';

    protected $fillable = [
        'nome',
    ];

    public function opcoes()
    {
        return $this->hasMany(GradeItem::class, 'grade_id', 'id');
    }
}
