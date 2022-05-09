<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    use HasFactory;

    protected $table = 'comments'; # copy from created schema

    protected $fillable = [
        'project_id',
        'name',
        'email',
        'comment'
    ];

    public function project(){
        #get category id
        return $this->belongsTo(Projects::class, 'project_id', 'id');
        #it only says ('foreign key','primary key')
    }
}
