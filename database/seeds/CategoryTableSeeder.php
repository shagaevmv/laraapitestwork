<?php

use App\Category;
use Faker\Factory;
use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * @return void
     */
    public function run()
    {
        Category::truncate();
        $faker = Factory::create();

        for ($i = 0; $i < 10; $i++) {
            Category::create(['title' => 'category - ' . $faker->sentence]);
        }
    }
}
