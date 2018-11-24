<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class verify extends Model
{
    public function position()
    {

        $this->belongsTo('App\init');
    }
}
