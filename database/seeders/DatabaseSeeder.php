<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Database\Factories\SocialsFactory;
use Database\Factories\TagsFactory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory(1)->create();
        \App\Models\Homepage::factory(1)->create();
        TagsFactory::new()->create();
        TagsFactory::new()->webDesign()->create();
        TagsFactory::new()->creativeDesign()->create();
        \App\Models\Projects::factory(6)->create();
        \App\Models\ProjectTags::factory(8)->create();
        SocialsFactory::new()->create();
        SocialsFactory::new()->linkedin()->create();
    }
}
