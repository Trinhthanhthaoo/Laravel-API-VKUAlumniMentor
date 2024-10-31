<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContactMessages extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('contact_messages')->insert([
            [
                'username' => 'NganNgan',
                'email' => 'ngan@example.com',
                'content' => 'Tôi muốn biết thêm thông tin về chương trình đào tạo.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'username' => 'Nuchery',
                'email' => 'nuchery@example.com',
                'content' => 'Tôi có thể hợp tác với bên bạn được không?',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'username' => 'LeTrinh',
                'email' => 'trinhtrinh@example.com',
                'content' => 'Rất cảm ơn các bạn vì những tài liệu hữu ích.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'username' => 'hoaipham',
                'email' => 'pxh@example.com',
                'content' => 'Bạn có lịch cập nhật có cuộc thi sắp tới diễn ra không.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            
        ]);
    }
}
