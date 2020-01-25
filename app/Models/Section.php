<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{

    protected $fillable = ['id','name','user_id'];
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function post(){
        return $this->hasMany(Post::class);
    }
}
