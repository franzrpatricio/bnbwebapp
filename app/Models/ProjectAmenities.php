<?php

namespace App\Models;

use App\Models\Projects;
use App\Models\Amenities;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProjectAmenities extends Model
{
    use HasFactory;
    protected $table = 'project_amenities';
    protected $fillable = [
        'project_id',
        'amenity_id',
        'posted_by'
    ];
    public function project(){
        return $this->belongsTo(Projects::class,'project_id','id');
    }
    public function amenities(){
        return $this->belongsTo(Amenities::class,'amenity_id','id');
    }
}
