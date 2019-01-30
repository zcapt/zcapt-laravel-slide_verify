<?php

namespace App\Console\Commands;


use Illuminate\Console\Command;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

class urlToBase64 extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'base64:generate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'convert url to base64';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle(Request $request)
    {


        $initBase64 = $this->generateInitBase64();
        $smallBase64 = $this->generateSmallBase64();
        $largeBase64 = $this->generateLargeBase64();
        $veriBase64 = $this->generateVeriBase64();

        // Next, we will replace the application key in the environment file so it is
        // automatically setup for this developer. This key gets generated using a
        // secure random byte generator and is later base64 encoded for storage.
        $path = base_path('.env');
        if (file_exists($path)) {
            file_put_contents($path, str_replace(
                'initBase64='.$this->laravel['config']['base64.initBase64'], 'initBase64='.$initBase64, file_get_contents($path)
            ));
            file_put_contents($path, str_replace(
                'smallBase64='.$this->laravel['config']['base64.smallBase64'], 'smallBase64='.$smallBase64, file_get_contents($path)
            ));
            file_put_contents($path, str_replace(
                'largeBase64='.$this->laravel['config']['base64.largeBase64'], 'largeBase64='.$largeBase64, file_get_contents($path)
            ));
            file_put_contents($path, str_replace(
                'veriBase64='.$this->laravel['config']['base64.veriBase64'], 'veriBase64='.$veriBase64, file_get_contents($path)
            ));

        }
        $this->laravel['config']['base64.initBase64'] = $initBase64;
        $this->laravel['config']['base64.smallBase64'] = $smallBase64;
        $this->laravel['config']['base64.largeBase64'] = $largeBase64;
        $this->laravel['config']['base64.veriBsae64'] = $veriBase64;
        $this->info("initBase64 [$initBase64] set successfully.");
        $this->info("smallBase64 [$smallBase64] set successfully.");
        $this->info("largeBase64 [$largeBase64] set successfully.");
        $this->info("veriBase64 [$veriBase64] set successfully.");

    }
    protected function generateInitBase64(){
        return base64_encode(URL::action('initController@index'));
    }
    protected function generateSmallBase64(){
        return base64_encode(URL::action('getSmallImageController@getImg'));
    }
    protected function generateLargeBase64(){
        return base64_encode(URL::action('getLargeImageController@getImg'));
    }
    protected function generateVeriBase64(){
        return base64_encode(URL::action('verifyController@verify'));
    }

}
