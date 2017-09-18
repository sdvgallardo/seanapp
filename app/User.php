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

    public static function postArchive($user){

      return static::selectRaw('year(created_at) year, monthname(created_at) month, user_id user, count(*) published')
        ->from('posts')
        ->where('user_id', $user)
        ->groupBy('year', 'month', 'user')
        ->orderByRaw('min(created_at) desc')
        ->get()
        ->toArray();
    }

    // public static function tagArchive(){
    //
    //   return static::selectRaw('name name, count(*) number')
    //     ->groupBy('name')
    //     ->orderByRaw('number desc')
    //     ->get()
    //     ->toArray();
    // }

    public function posts(){
      return $this->hasMany(Post::class);
    }

}
