<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Logs extends Model
{
    use HasFactory;

    protected $table = 'user_activity_logs';

    protected $fillable = [

        'user_id',
        'name',
        'role_as',
        'description',
    ];
}
