<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class verifyController extends Controller
{
    public function verify(request $request)
    {

        $inputX = $request->input('x');
        $inputY = $request->input('y');

        //get value of authID from init.php
        $response_authID = app('App\Http\Controllers\initController')->index($request);
        $authID = $response_authID->getOriginalContent()['authID'];
        $error = 10;

        // Calculate the diagonal coordinate for that square
        $position_x = current(DB::table('inits')
            ->select('x')
            ->where('authID', '=', $authID)
            ->inRandomOrder()
            ->first());
        $position_y = current(DB::table('inits')
            ->select('y')
            ->where('authID', '=', $authID)
            ->inRandomOrder()
            ->first());
        //verify
        if (($inputX < ($position_x + $error) && $inputX > $position_x - $error) && ($inputY < ($position_y + $error)) && ($inputY > ($position_y - $error))) {

            $update_authID = DB::table('inits')->where('authID', '=', $authID)
                ->update(['verified' => 1]);
            if ($response_authID == true) {
                return response()->json(['status:' => 0, 'reason' => '']);
            } else {
                return "Error: " . $update_authID;
            }
        } else {

            $delete_authID = DB::table('inits')->where('authID', '=', $authID)
                ->delete();
            if ($response_authID == true) {

                return response()->json(['status:' => 1, 'reason' => ''], 400);
            } else {
                echo "Error: " . $delete_authID;
            }

        }
    }


}




