<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    public function tags()
    {

        return $this->belongsToMany('App\Tag')->withTimestamps();
        
    }
}
