<?php

namespace App\Models;

use App\Models\Projects;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProjectImages extends Model
{
    use HasFactory;
    protected $table = 'project_images';

    protected $fillable = [
        'project_id',
        'image'
    ];

    public function project(){
        return $this->belongsTo(Projects::class, 'project_id', 'id');
    }
}