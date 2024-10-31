<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenteeInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('mentee_info')->insert([
            [
                'user_id' => 1, 
                'gpa' => 3.5,
                'achievements' => 'Dean\'s List, Completed multiple internships.',
                'goals' => 'To secure a position in a reputable tech company.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 2, 
                'gpa' => 3.8,
                'achievements' => 'Published research paper in AI.',
                'goals' => 'To pursue a master\'s degree in Data Science.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 3,
                'gpa' => 3.9,
                'achievements' => 'Won a national coding competition.',
                'goals' => 'To work in cybersecurity.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 4, 
                'gpa' => 3.6,
                'achievements' => 'Created several successful mobile apps.',
                'goals' => 'To develop innovative mobile solutions.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 5, 
                'gpa' => 3.7,
                'achievements' => 'Completed an internship at a top AI company.',
                'goals' => 'To lead AI projects in the future.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
           
        ]);
    }
}
