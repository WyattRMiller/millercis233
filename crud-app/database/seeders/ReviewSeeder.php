<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use \App\Models\Product;
use \App\Models\Review;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Review::query()->delete();

        $faker = \Faker\Factory::create();
        $productIdEnd = Product::orderBy('id')->limit(1)->pluck('id')->all();
        $productIdStart = Product::orderByDesc('id')->limit(1)->pluck('id')->all();

        foreach(range(1,150) as $number) {
            Review::create([
                'comment' => $faker->sentence($nbWords = 20, $variableNbWords = true),
                'rating' => $faker->numberBetween(
                    $min = 1, $max = 5
                ),
                'product_id' => $faker->numberBetween(
                $min = $productIdStart[0], 
                $max = $productIdEnd[0])
            ]);
        }
    }
}