<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class initController extends Controller
{
    public function index(Request $request)
    {

        $init=DB::table('inits')->select('authID')->inRandomOrder()->first();
        if($init == false){
            return response()->json(['status:' => 1 ,'authID' => current($init)]);
        }
        return response()->json(['status:' => 0,'authID' => current($init)]);
    }
}
