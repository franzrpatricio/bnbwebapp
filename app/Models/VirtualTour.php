<?php

namespace App\Models;

use App\Models\Projects;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class VirtualTour extends Model
{
    use HasFactory;
    protected $table = 'virtual_tour';

    protected $fillable = [
        'project_id',
        'video',
        'text'
    ];

    public function project(){
        return $this->belongsTo(Projects::class, 'project_id', 'id');
    }
}
