<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserRolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_roles')->insert([
            ['user_id' => 1, 'role_id' => 1], // Thanh Thao - Admin
            ['user_id' => 2, 'role_id' => 2], // Quang Kinh - Mentor
            ['user_id' => 3, 'role_id' => 3], // Thao Vy - Mentee
            ['user_id' => 4, 'role_id' => 4], // Ky Dai - User
            ['user_id' => 5, 'role_id' => 4], // Papa - User
            // Thêm các người dùng và vai trò khác nếu cần
        ]);
    }
}
