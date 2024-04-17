<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Stancl\Tenancy\Database\Concerns\BelongsToTenant;

class GradeItem extends Model
{

    protected $table = 'grade_item';
    protected $primaryKey = 'id';

    protected $fillable = [
        'nome',
        'grade_id',
        'ordem',
    ];

    protected static function booted(): void
    {
        parent::booted();

        static::creating(function ($gradeItem) {
            $gradeItem->ordem = GradeItem::where('grade_id', $gradeItem->grade_id)->max('ordem') + 1;
        });
    }

}
