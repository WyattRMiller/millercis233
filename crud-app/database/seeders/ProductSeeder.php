<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Product::query()->delete();

        $faker = \Faker\Factory::create();


        foreach(range(1,30) as $number) {
            \App\Models\Product::create([
                'name' => 'Product',
                'price' => $faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 1000000.00),
                'description' => 'This is the description of a product',
                'item_number' => $faker->numberBetween($min = 0, $max = 10000),
                'image' => $faker->imageUrl
            ]);
        }
    }
}
