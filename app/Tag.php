<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    //
    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public static function archives()
    {
        return static::selectRaw('name name, count(*) number')
          ->groupBy('name')
          ->orderByRaw('number desc')
          ->get()
          ->toArray();
    }

    public function getRouteKeyName()
    {
        return 'name';
    }
}
