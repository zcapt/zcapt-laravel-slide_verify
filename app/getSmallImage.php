<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class getSmallImage extends Model
{
    public function position()
    {

        $this->belongsTo('App\init');
    }
}
