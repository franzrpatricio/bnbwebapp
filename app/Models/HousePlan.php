<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HousePlan extends Model
{
    use HasFactory, SoftDeletes;

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
