<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('categories')->insert([
            ['name' => 'Tiểu thuyết'],
            ['name' => 'Trinh thám'],
            ['name' => 'Công nghệ thông tin'],
            ['name' => 'Kinh tế'],
            ['name' => 'Văn học'],
        ]);
    }
}
