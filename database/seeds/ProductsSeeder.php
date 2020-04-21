<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

/**
 * Class ProductsSeeder
 */
class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        for($i = 0; $i < 20; $i++):
            DB::table('products')
                ->insert([
                    'title'=> $faker->sentence,
                    'imagePath'=>$faker->imageUrl(),
                    'price'=>$faker->randomFloat(2,16,250),
                    'description'=>$faker->paragraph,
                ]);
        endfor;
    }
}
