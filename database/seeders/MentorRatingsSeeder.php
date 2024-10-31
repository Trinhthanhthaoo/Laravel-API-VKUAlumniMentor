<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MentorRatingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('mentor_ratings')->insert([
            [
                'mentee_id' => 1, // ID của mentee
                'rating' => 4.5,
                'comments' => 'Mentor rất nhiệt tình và hỗ trợ tốt.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'mentee_id' => 2, // ID của mentee
                'rating' => 5.0,
                'comments' => 'Rất hài lòng với sự hướng dẫn của mentor!',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'mentee_id' => 3, // ID của mentee
                'rating' => 4.0,
                'comments' => 'Mentor có nhiều kiến thức và kinh nghiệm.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'mentee_id' => 1, // ID của mentee
                'rating' => 3.5,
                'comments' => 'Mentor cần cải thiện khả năng giao tiếp.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'mentee_id' => 2, // ID của mentee
                'rating' => 4.8,
                'comments' => 'Thật tuyệt vời, đã giúp tôi rất nhiều!',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
