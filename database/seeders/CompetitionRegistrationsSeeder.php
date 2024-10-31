<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompetitionRegistrationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('competitions_registrations')->insert([
            [
                'competition_id' => 1, // ID của cuộc thi
                'mentee_id' => 1, // ID của mentee
                'user_id' => 1, // ID của user
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'competition_id' => 1,
                'mentee_id' => 2,
                'user_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'competition_id' => 2,
                'mentee_id' => 1,
                'user_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'competition_id' => 2,
                'mentee_id' => 3,
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'competition_id' => 3,
                'mentee_id' => 2,
                'user_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
           
        ]);
    }
}
