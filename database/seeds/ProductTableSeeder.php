<?php

use App\Product;
use Faker\Factory;
use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * @return void
     */
    public function run()
    {
        Product::truncate();
        $faker = Factory::create();

        for ($i = 0; $i < 100; $i++) {
            Product::create(['title' => $faker->sentence]);
        }
    }
}
