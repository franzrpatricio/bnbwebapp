<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Files extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'project_id',
        'filenames'
    ];

    public function project(){
        return $this->belongsTo(Projects::class, 'project_id', 'id');
    }

    public function setFilenamesAttribute($value){
        $this->attributes['filenames'] = json_encode($value);
    }
}
