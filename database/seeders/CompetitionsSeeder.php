<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompetitionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('competitions')->insert([
            [
                'mentor_id' => 1, // ID của mentor
                'title' => 'Cuộc thi lập trình web',
                'description' => 'Tham gia cuộc thi lập trình web để thể hiện kỹ năng của bạn và nhận giải thưởng hấp dẫn!',
                'start_date' => '2024-11-01',
                'end_date' => '2024-11-30',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'mentor_id' => 2, // ID của mentor
                'title' => 'Cuộc thi phân tích dữ liệu',
                'description' => 'Khám phá thế giới dữ liệu qua cuộc thi phân tích dữ liệu. Giải thưởng sẽ được trao cho những người xuất sắc nhất.',
                'start_date' => '2024-12-01',
                'end_date' => '2024-12-15',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'mentor_id' => 1, // ID của mentor
                'title' => 'Cuộc thi ý tưởng khởi nghiệp',
                'description' => 'Chia sẻ ý tưởng khởi nghiệp của bạn và nhận sự hỗ trợ từ các chuyên gia. Hãy tham gia ngay!',
                'start_date' => '2024-12-16',
                'end_date' => '2025-01-15',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'mentor_id' => 3, // ID của mentor
                'title' => 'Cuộc thi viết blog công nghệ',
                'description' => 'Viết blog về công nghệ mới nhất và giành giải thưởng hấp dẫn!',
                'start_date' => '2025-01-01',
                'end_date' => '2025-01-31',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'mentor_id' => 4, // ID của mentor
                'title' => 'Cuộc thi thiết kế giao diện người dùng',
                'description' => 'Thể hiện khả năng thiết kế giao diện người dùng của bạn trong cuộc thi này.',
                'start_date' => '2025-02-01',
                'end_date' => '2025-02-28',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'mentor_id' => 5, // ID của mentor
                'title' => 'Cuộc thi phát triển ứng dụng di động',
                'description' => 'Tham gia cuộc thi phát triển ứng dụng di động và nhận sự hỗ trợ từ các chuyên gia.',
                'start_date' => '2025-03-01',
                'end_date' => '2025-03-31',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'mentor_id' => 2, // ID của mentor
                'title' => 'Cuộc thi phân tích dữ liệu lớn',
                'description' => 'Tham gia phân tích dữ liệu lớn và trình bày kết quả của bạn trước ban giám khảo.',
                'start_date' => '2025-04-01',
                'end_date' => '2025-04-15',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'mentor_id' => 3, // ID của mentor
                'title' => 'Cuộc thi lập trình game',
                'description' => 'Thiết kế và phát triển một game để tham gia cuộc thi này.',
                'start_date' => '2025-05-01',
                'end_date' => '2025-05-31',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
