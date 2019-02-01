<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class init extends Model
{
    protected $fillable = ['authID', 'x', 'y', 'verified'];


    public function largeImg(){
        return $this->hasmany('App\getLargeImage.php');
    }
}
