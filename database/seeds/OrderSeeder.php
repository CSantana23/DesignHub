<?php

use Faker\Factory;
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
        $faker = Factory::create();
        for($i = 0; $i < 20; $i++):
            DB::table('orders')
                ->insert([
                    'order_qty'=> $faker->randomNumber(null,false),
                    'grand_total'=>$faker->randomFloat(2,35,700),
                    'unit_price'=>$faker->randomFloat(2,1,50),
                    'purchase_id'=>$faker->uuid,
                    'status'=>$faker->boolean,
                    'address_line1'=>$faker->address,
                    'address_city'=>$faker->city,
                    'state'=>$faker->state,
                    'zip'=>$faker->postcode,
                    'customer_name'=>$faker->name,
                    'phone'=>$faker->phoneNumber,
                    'product_name'=>$faker->sentence,
                    'email'=>$faker->email,
                    'img_url'=>$faker->imageUrl(),
                ]);
        endfor;
    }
}
