<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comments extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'comments'; # copy from created schema

    protected $fillable = [
        'project_id',
        'name',
        'email',
        'comment'
    ];
    protected $dates = ['deleted_at'];

    public function project(){
        #get category id
        return $this->belongsTo(Projects::class, 'project_id', 'id');
        #it only says ('foreign key','primary key')
    }
}
