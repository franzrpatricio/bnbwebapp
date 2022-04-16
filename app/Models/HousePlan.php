<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HousePlan extends Model
{
    use HasFactory;

    protected $table = 'house_plan'; # coming from migrations

    protected $fillable = [
        'type',
        'cost',
        'floor',
        'wall',
        'window',
        'ceiling',
        'status',
        'created_by'
    ];
}
