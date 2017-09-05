<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    //
    public function posts(){
      return $this->belongsToMany(Post::class)->latest();
    }

    public static function tagNumbers(){

      return static::selectRaw('tag_id, count(*) number')
        ->from('post_tag')
        ->groupBy('tag_id')
        ->get()
        ->toArray();
    }

    public function getRouteKeyName(){
      return 'name';
    }
}
