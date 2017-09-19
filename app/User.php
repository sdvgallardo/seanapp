<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public static function postArchive($userID){

      return static::selectRaw('year(created_at) year, monthname(created_at) month, user_id user, count(*) published')
        ->from('posts')
        ->where('user_id', $userID)
        ->groupBy('year', 'month', 'user')
        ->orderByRaw('min(created_at) desc')
        ->get()
        ->toArray();
    }

    public static function tagArchive($userID){

      return static::selectRaw('tags.name name, tags.post_id, posts.id, posts.user_id, users.id user, count(*) number')
        ->from('tags')
        ->join('posts', 'tags.post_id', '=', 'posts.id')
        ->join('users', 'posts.user_id', '=', 'users.id')
        ->where('user_id', $userID)
        ->groupBy('name')
        ->orderByRaw('number desc')
        ->get()
        ->toArray();
    }

    public function posts(){
      return $this->hasMany(Post::class);
    }

}
