<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
use App\init;



class initController extends Controller
{

    public function index(Request $request)
    {

        $initNew= factory(init::class, 1)->create();
        $init = array_pluck($initNew, 'authID');

        if($init == false){
            return response()->json(['status:' => 1 ,'authID' => current($init)]);
        }
        return response()->json(['status:' => 0,'authID' => current($init)]);
    }

}
