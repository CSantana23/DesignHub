<?php

use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
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
            DB::table('orders')
                ->insert([
                    'order_qty'=> $faker->randomNumber(null,false),
                    'grand_total'=>$faker->randomFloat(2,35,700),
                    'unit_price'=>$faker->randomFloat(2,1,50),
                    'purchase_id'=>$faker->uuid,
                    'status'=>$faker->boolean,
                ]);
        endfor;
    }
}
