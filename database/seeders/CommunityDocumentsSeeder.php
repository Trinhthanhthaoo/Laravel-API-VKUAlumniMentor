<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CommunityDocumentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('community_documents')->insert([
            [
                'mentor_id' => 1, // ID của mentor
                'mentee_id' => null, // không có mentee
                'title' => 'Hướng dẫn lập trình web',
                'content' => 'Tài liệu hướng dẫn chi tiết về lập trình web cho người mới bắt đầu.',
                'status' => 'approved',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'mentor_id' => 2, // ID của mentor
                'mentee_id' => null, // ID của mentee
                'title' => 'Phân tích dữ liệu hiệu quả',
                'content' => 'Tài liệu này bao gồm các công cụ và kỹ thuật phân tích dữ liệu.',
                'status' => 'pending',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'mentor_id' => null, // không có mentor
                'mentee_id' => 3, // ID của mentee
                'title' => 'Kinh nghiệm phát triển bản thân',
                'content' => 'Một số gợi ý để phát triển bản thân và sự nghiệp.',
                'status' => 'rejected',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'mentor_id' => 1, // ID của mentor
                'mentee_id' => null, // ID của mentee
                'title' => 'Tài liệu hướng dẫn sử dụng công cụ',
                'content' => 'Hướng dẫn chi tiết về cách sử dụng các công cụ phát triển.',
                'status' => 'approved',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            
        ]);
    }
}
