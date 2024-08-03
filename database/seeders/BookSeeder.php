<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $faker=Faker::create();

        for ($i = 0; $i < 100; $i++) {
            DB::table('books')->insert([
                'title' => $faker->text(25),
                'thumbnail'=>'https://tiki.vn/blog/wp-content/uploads/2023/08/phan-4-dac-nhan-tam-1024x1024.jpg',
                'publisher' => $faker->company,
                'price' => $faker->randomFloat(2, 1, 100),
                'quantity' => $faker->numberBetween(1,100),
                'author' => $faker->name,
                'publication' => $faker->date,
                'category_id' =>rand(1,5),
            ]);
        }

    }
}
