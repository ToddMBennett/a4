<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    public function bills() {

        return $this->hasMany('App\Bill');

    }
}}
