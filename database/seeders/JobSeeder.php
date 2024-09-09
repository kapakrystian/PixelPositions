<?php

namespace Database\Seeders;

use App\Models\Job;
use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class JobSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Assign to variable three Tags from TagFactory
        $tags = Tag::factory(3)->create();

        //Use $tags variable into each new Job's record and connect them
        Job::factory(20)->hasAttached($tags)->create(new Sequence([
            'featured' => false,
            'schedule' => 'Full Time'
        ], [
            'featured' => false,
            'schedule' => 'Part Time'
        ], [
            'featured' => true,
            'schedule' => 'Full Time'
        ], [
            'featured' => true,
            'schedule' => 'Part Time'
        ]));
    }
}
