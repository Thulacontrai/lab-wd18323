<?php

namespace Database\Seeders;

use App\Models\Movie;
use Faker\Factory as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
//        Movie::factory()->count(50)->create();

        $fake=Faker::create();
        
        for ($i = 0; $i < 50; $i++) {
            Movie::create([  
                'title' => $fake->unique()->sentence(3),
                'poster' =>$fake->randomElement([
                    'https://upload.wikimedia.org/wikipedia/vi/2/2d/Avengers_Endgame_bia_teaser.jpg',
                    'https://s3.cloud.cmctelecom.vn/tinhte2/2019/01/4555289_cover_Tom_and_jerry_Tinhte.jpg',
                    'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQSi9UUAKbQTV944y2SV4ChUu5wKDaaZ9IzWg&s']),
                'intro' => $fake->text(),
                'release_date' => $fake->date(),
                'genre_id' => $fake->numberBetween(1, 5), // Assuming you have 5 genres in your database
            ]);
        }
        

    }   
}
