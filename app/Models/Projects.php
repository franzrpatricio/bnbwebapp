<?php

namespace App\Models;

use App\Models\Files;
use App\Models\Category;
use App\Models\Amenities;
use App\Models\HousePlan;
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
        'image',
        'vtour',
        'cost',
        'slug',
        'description',
        'designs' => 'array',
        'amenities' => 'array',
        'meta_title',
        'meta_description',
        'meta_keyword',
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
    // public function files() 
    // {
    //     return $this->hasMany(Files::class,'project_id', 'id'); 
    // }
    // public function design() 
    // {
    //     return $this->hasMany(Designs::class,'design_id', 'id'); 
    // }

    /**
     * Set the ProjDesgins
     *
     */
    // public function setCatAttribute($value)
    // {
    //     $this->attributes['cat'] = json_encode($value);
    // }
  
    // /**
    //  * Get the ProjDesigns
    //  *
    //  */
    // public function getCatAttribute($value)
    // {
    //     return $this->attributes['cat'] = json_decode($value);
    // }
}
