<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Post;
use App\Comment;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'email', 'password', 'role_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function posts(){
        //$user->posts()
        return $this->hasMany(Post::class);
    }
    public function role(){
        return $this->belongsTo(Role::class);
    }
    public function comments(){
        return $this->hasMany(Comment::class);
    }

    public function hasRole($role){
        return array_search($role,[$this->role]);
    }

    public function isAdmin(User $user)
    {
        if($user->role_id == 1) {
            return true;
        }
        return false;
    }
}
