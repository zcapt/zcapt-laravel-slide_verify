<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class getLargeImage extends Model
{
    public function postion(){

        return $this->belongsTo('App\init');
    }
}
