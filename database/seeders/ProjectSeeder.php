<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProjectSeeder extends Seeder
{
    public function run()
    {
        // Seed 5 projects with random short names
        DB::table('projects')->insert([
            'name' => $this->generateRandomShortName(),
        ]);
    }

    // Generate a random short name
    private function generateRandomShortName()
    {
        $adjectives = ['Red', 'Blue', 'Green', 'Yellow', 'Purple', 'Orange'];
        $nouns = ['Cat', 'Dog', 'Fish', 'Bird', 'Tree', 'Mountain'];

        $randomAdjective = $adjectives[array_rand($adjectives)];
        $randomNoun = $nouns[array_rand($nouns)];

        return $randomAdjective . ' ' . $randomNoun;
    }
}
