<?php

namespace App\Models;

use App\Models\Category;
use App\Models\HousePlan;
use App\Models\VirtualTour;
use App\Models\ProjectImages;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Projects extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'projects'; # copy from created schema

    protected $fillable = [
        'category_id',
        'houseplan_id',
        'name',
        // 'image',
        // 'vtour',
        'cost',
        'slug',
        'description',
        'designs' => 'array',
        'amenities' => 'array',
        'meta_title',
        'meta_description',
        // 'meta_keyword',
        'status',
        'posted_by'
    ];
    protected $dates = ['deleted_at'];
    
    public function category(){
        #get category id
        return $this->belongsTo(Category::class, 'category_id', 'id');
        #it only says ('foreign key','primary key')
    }
    public function houseplan(){
        #get category id
        return $this->belongsTo(HousePlan::class, 'houseplan_id', 'id');
        #it only says ('foreign key','primary key')
    }
    public function gallery() 
    {
        return $this->hasMany(ProjectImages::class,'project_id', 'id'); 
    }
    public function vtour() 
    {
        return $this->hasMany(VirtualTour::class,'project_id', 'id'); 
    }
    public function comments(){
        return $this->hasMany(Comments::class, 'project_id','id');
    }
}
