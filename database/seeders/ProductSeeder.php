<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        for ($i=0; $i < 5; $i++) { 
            DB::table('products')->insert([
                'name' => Str::random(10),
                'price' => rand(10.00, 150.00),
                'description' => Str::random(150),
            ]);
        }
    }
}
