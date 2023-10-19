<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Project;
use Illuminate\Support\Facades\DB;

class TaskSeeder extends Seeder
{
    public function run()
    {
        // Get all projects
        $projects = Project::all();

        // Seed tasks for each project
        foreach ($projects as $project) {
            $numberOfTasks = rand(2, 6); // Random number between 2 and 6

            for ($i = 0; $i < $numberOfTasks; $i++) {
                DB::table('tasks')->insert([
                    'task_name' => $this->generateRandomShortName(),
                    'priority' => rand(1, 5), // Random priority between 1 and 5
                    'project_id' => $project->id,
                ]);
            }
        }
    }

    // Generate a random short name
    private function generateRandomShortName()
    {
        $adjectives = ['Awesome', 'Cool', 'Fantastic', 'Amazing', 'Great'];
        $nouns = ['Task', 'Project', 'Job', 'Assignment', 'Chore'];

        $randomAdjective = $adjectives[array_rand($adjectives)];
        $randomNoun = $nouns[array_rand($nouns)];

        return $randomAdjective . ' ' . $randomNoun;
    }
}
