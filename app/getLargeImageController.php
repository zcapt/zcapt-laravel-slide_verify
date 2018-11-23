<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class getLargeImageController extends Model
{
    public function postion(){

        return $this->belongsTo('App\init');
    }
}
