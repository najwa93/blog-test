<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $fillable = ['path'];

    public function post(){
        return $this->belongsToMany(Post::class,'post_photos');
    }
}
