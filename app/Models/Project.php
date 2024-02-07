<?php

namespace App\Models;
use Illuminate\Support\Str;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    use HasFactory;
    
    public $fillable = ['title','image_path','description','type_id'];

    use SoftDeletes;

    public function setTitleAttribute($value)
    {
        $this->attributes["title"] = $value;
        $this->attributes["slug"]=Str::slug($value);
    }

    public function type(){
        return $this->belongsTo(Type::class);
    }

    public function technologies(){
        return $this->belongsToMany(Technology::class);
    }
}
