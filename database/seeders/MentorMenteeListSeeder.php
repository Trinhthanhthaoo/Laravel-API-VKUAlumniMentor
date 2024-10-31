<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MentorMenteeListSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('mentor_mentee_list')->insert([
            [
                'mentee_id' => 1, // ID của mentee là Thanh Thao
                'mentor_id' => 1, // ID của mentor tương ứng
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'mentee_id' => 2, // ID của mentee là Quang Kinh
                'mentor_id' => 2, // ID của mentor tương ứng
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'mentee_id' => 3, // ID của mentee là Thao Vy
                'mentor_id' => 1, // ID của mentor tương ứng
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'mentee_id' => 4, // ID của mentee là Ky Dai
                'mentor_id' => 3, // ID của mentor tương ứng
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'mentee_id' => 5, // ID của mentee là Papa
                'mentor_id' => 2, // ID của mentor tương ứng
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Thêm nhiều cặp mentor-mentee khác nếu cần
        ]);
    }
}
