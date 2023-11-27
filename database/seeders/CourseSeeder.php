<?php

namespace Database\Seeders;

use App\Models\Course;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Course::factory()->count(1)->sequence(
            [
                'nama_kursus' => 'Programming',
                'jam' => '10:00-12:00'
            ]
        )->create();
    }
}
