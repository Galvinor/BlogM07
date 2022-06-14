<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Post;

class Tag extends Model
{
    protected $fillable=['tag','user_id','post_id'];

    public function posts(){
        return $this->belongsToMany(Post::class);
    }
}
