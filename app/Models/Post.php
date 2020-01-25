<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function section(){
        return $this->belongsTo(Section::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function comment(){
        return $this->hasMany(Comment::class);
    }

    public function photo(){
        return $this->belongsToMany(Photo::class,'post_photos');
    }
}
