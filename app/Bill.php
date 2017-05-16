<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{

    public function restaurant() {

        return $this->belongsTo('App\Restaurant');
    }

    public function tags()
    {

        return $this->belongsToMany('App\Tag')->withTimestamps();

    }
}
