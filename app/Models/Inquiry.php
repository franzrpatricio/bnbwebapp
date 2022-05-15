<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Inquiry extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'inquiries'; # copy from created schema

    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
        'message'
    ];
    protected $dates = ['deleted_at'];
}
