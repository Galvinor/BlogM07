<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Tag;

class Post extends Model
{
    protected $fillable=['title','contents','user_id'];

    public function user(){
        return $this->hasOne(User::class);
    }
    public function tags(){
        return $this->hasMany(Tag::class);
    }
}
