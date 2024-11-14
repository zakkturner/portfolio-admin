<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\Project;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory()->create([
            'name' => 'Zach Turner',
            'email' => 'zakkturner1993@gmail.com',
        ]);

//         Category::factory()->create(['name' => 'frontend']);
//         Category::factory()->create(['name' => 'ecommerce']);
//        Category::factory()->create(['name' => 'php']);
        $categories = Category::factory(4)->create();
        $users = \App\Models\User::factory(10)->create();
         Project::factory(10)->recycle($users)->create();
    }
}
