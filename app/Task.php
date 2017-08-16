<?php

namespace App;

class Task extends Model
{
    //
    public function scopeIncomplete($query) //Taske::Incomplete
    {
      return $query->where('completed', 0);
    }

    public function isComplete()
    {
      return false;
    }
}
