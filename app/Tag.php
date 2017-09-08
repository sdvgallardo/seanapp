<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    //
    public function posts(){
      return $this->belongsToMany(Post::class)->latest();
    }

    public static function archives(){

      // return null;
      return static::selectRaw('name name, count(*) number')
        ->groupBy('name')
        ->orderByRaw('number desc')
        ->get()
        ->toArray();
    }

    public function getRouteKeyName(){
      return 'name';
    }
}
