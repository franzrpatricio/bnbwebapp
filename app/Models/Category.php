<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory, SoftDeletes;
    #from create categories table migrations
    #store the created schema = categories
    #SCHEMA...sa madaling salita MODEL
    protected $table = 'categories';

    protected $fillable = [
        'name',
        'slug',
        'description',
        'image',
        'meta_title',
        'meta_description',
        // 'meta_keyword',
        'status',
        'feature',
        'created_by'
    ];
}
