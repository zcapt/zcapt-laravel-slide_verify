<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class getSmallImageController extends Controller
{
    public function getImg(request $request)
    {
        // Get the image from local file. The image must be 300*200 size.
        $img_path = $this->random_pic();

        $img = imagecreatefromjpeg($img_path);

        $img_size = getimagesize($img_path);
        if ($img_size[0] != 300 || $img_size[1] != 200)
            die("image size must be 300*200");

        //get value of authID from getLargeImageController.php
        $response = app('App\Http\Controllers\initController')->index($request);
        $authID = $response->getOriginalContent()['authID'];

        // Calculate the diagonal coordinate for that square
        $position_x_1 = current(DB::table('inits')
            ->select('x')
            ->where('authID', '=', $authID)
            ->first());

        $position_y_1 = current(DB::table('inits')
            ->select('y')
            ->where('authID', '=', $authID)
            ->first());


// Create a small image with height 50 and width 50

        $img_small = imagecreatetruecolor(50, 50);
// Copy one part of the large image (the image with size 300*200) to small part of image

        imagecopy($img_small, $img, 0, 0, $position_x_1, $position_y_1, 50, 50);
// Change brightness of the picture
        imagefilter($img_small, IMG_FILTER_BRIGHTNESS, 50);
        $position_1 = 0;
        $position_2 = 50;
// Adding some blur in to small picture
        for ($i = 50; $i < 120; $i = $i + 6) {
            imagerectangle($img_small, $position_1, $position_1, $position_2, $position_2, imagecolorallocatealpha($img_small, 255, 255, 255, $i));
            $position_1 = $position_1 + 1;
            $position_2 = $position_2 - 1;
        }// Set header in type jpg

        ;
// Generate image

        header("Content-type: image/jpg");
// Generate image
        imagejpeg($img_small);
// Release memory
        imagedestroy($img_small);;
        imagedestroy($img);
        exit;
    }

    public function random_pic(){
        $files = glob('../app/Repository/Image/*.*');
        $random_pic = array_random($files);
         return $random_pic;
    }

}
