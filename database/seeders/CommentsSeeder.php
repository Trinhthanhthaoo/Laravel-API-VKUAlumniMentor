<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CommentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('comments')->insert([
            [
                'document_id' => 1, // ID của tài liệu
                'user_id' => 1, // ID của người dùng
                'content' => 'Tài liệu này rất hữu ích cho người mới bắt đầu!',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'document_id' => 2, // ID của tài liệu
                'user_id' => 2, // ID của người dùng
                'content' => 'Cảm ơn vì đã chia sẻ tài liệu này.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'document_id' => 1, // ID của tài liệu
                'user_id' => 3, // ID của người dùng
                'content' => 'Có thể cho biết thêm về các ví dụ không?',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'document_id' => 3, // ID của tài liệu
                'user_id' => 1, // ID của người dùng
                'content' => 'Tôi đã áp dụng kiến thức này và thấy hiệu quả.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'document_id' => 2, // ID của tài liệu
                'user_id' => 2, // ID của người dùng
                'content' => 'Rất mong có thêm tài liệu tương tự trong tương lai.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
