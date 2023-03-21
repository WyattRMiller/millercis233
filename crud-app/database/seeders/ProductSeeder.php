<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use \App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        Product::query()->delete();

        $faker = \Faker\Factory::create();


        foreach(range(1,300) as $number) {
            Product::create([
                'name' => $faker->word,
                'price' => $faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 100.00),
                'description' => 'This is the description of a product',
                'item_number' => $faker->numberBetween($min = 0, $max = 10000),
                'image' => $faker->imageUrl,
            ]);
        }
    }
}
