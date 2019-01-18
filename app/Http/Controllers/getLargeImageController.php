<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class getLargeImageController extends Controller
{


    public function getImg(Request $request)

    {
        // Get the image from local file. The image must be 300*200 size.
        //change $img to your own path
        $img_path = '../app/Repository/Image/1.jpg';
        $img = imagecreatefromjpeg($img_path);
        $img_size = getimagesize($img_path);
        if ($img_size[0] != 300 || $img_size[1] != 200)
            die("image size must be 300*200");


        //get value of authID from init.php
        $response = app('App\Http\Controllers\initController')->index($request);
        $authID = $response->getOriginalContent()['authID'];

        // Calculate the diagonal coordinate for that square
        $position_x_1 = current(DB::table('inits')
            ->select('x')
            ->where('authID', '=', $authID)
            ->inRandomOrder()
            ->first());

        $position_y_1 = current(DB::table('inits')
            ->select('y')
            ->where('authID', '=', $authID)
            ->inRandomOrder()
            ->first());

        $position_x_2 = $position_x_1 + 50;
        $position_y_2 = $position_y_1 + 50;

        $i = 57;
        while ($i < 127) {
            imagerectangle($img, $position_x_1, $position_y_1, $position_x_2, $position_y_2, imagecolorallocatealpha($img, 0, 0, 0, $i));

            $position_x_1 = $position_x_1 + 1;
            $position_y_1 = $position_y_1 + 1;
            $position_x_2 = $position_x_2 - 1;
            $position_y_2 = $position_y_2 - 1;
            $i = $i + 10;
        }
        // Set header in type jpg
        header("Content-type: image/jpg");
        // Generate image
        imagejpeg($img);
        // Release memory
        imagedestroy($img);


    }

    public function convertBase64(Request $request){
        return base64_encode(Request::url());
    }

}
