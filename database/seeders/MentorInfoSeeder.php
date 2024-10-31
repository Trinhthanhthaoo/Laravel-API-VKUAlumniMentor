<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MentorInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('mentor_info')->insert([
            [
                'user_id' => 1,
                'expertise' => 'Web Development',
                'organization' => 'VKU',
                'referral_source' => 'Social Media',
                'suggestions_questions' => 'How to improve coding skills?',
                'achievements' => 'Built several successful web applications.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 2, 
                'expertise' => 'Data Science',
                'organization' => 'Tech Company',
                'referral_source' => 'Friends',
                'suggestions_questions' => 'What are the best tools for data analysis?',
                'achievements' => 'Published research papers in data analytics.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 3,
                'expertise' => 'Cybersecurity',
                'organization' => 'Security Solutions',
                'referral_source' => 'Webinars',
                'suggestions_questions' => 'What are the latest trends in cybersecurity?',
                'achievements' => 'Successfully secured multiple enterprise systems.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 4,
                'expertise' => 'Mobile App Development',
                'organization' => 'App Innovations',
                'referral_source' => 'Networking Events',
                'suggestions_questions' => 'How to design a user-friendly app?',
                'achievements' => 'Developed award-winning mobile applications.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 5, 
                'expertise' => 'Artificial Intelligence',
                'organization' => 'AI Research Lab',
                'referral_source' => 'Academic Conferences',
                'suggestions_questions' => 'What are the ethical considerations in AI?',
                'achievements' => 'Contributed to significant AI research papers.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
           
        ]);
    }
}
