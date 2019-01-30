<?php

use Illuminate\Database\Seeder;
use App\init;
class initTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(init::class, 30)->create();
    }
}
