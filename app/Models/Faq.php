<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Faq extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'faqs'; # copy from created schema

    protected $fillable = [
        'question',
        'answewr',
        'posted_by'
    ];
    protected $dates = ['deleted_at'];
}
