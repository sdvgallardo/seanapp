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
        return $this->completed;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function cut($body)
    {
        return wordwrap($body, 25, "\n", true);
    }
}
