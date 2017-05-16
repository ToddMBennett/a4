<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public function bills() {

        return $this->belongsToMany('App\Bill')->withTimestamps();

    }
}
