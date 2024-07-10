<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = ['id_category','name_project','url_project','url_youtube','url_github','thumnail_project','description_project'];

    public function category(){
        return $this->belongsTo(Category::class,'id_category');
    }
}
