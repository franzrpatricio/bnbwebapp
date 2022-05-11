<?php

namespace App\Models;

use App\Models\Designs;
use App\Models\Projects;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProjectDesigns extends Model
{
    use HasFactory;
    protected $table = 'project_designs';
    protected $fillable = [
        'project_id',
        'design_id',
        'posted_by'
    ];
    public function project(){
        return $this->belongsTo(Projects::class,'project_id','id');
    }
    public function designs(){
        return $this->belongsTo(Designs::class,'design_id','id');
    }
}
