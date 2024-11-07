<?php

namespace App\Http\Controllers;

use App\Models\MentorMenteeList;
use Illuminate\Http\Request;

class MentorMenteeListController extends Controller
{
    // Lấy tất cả thông tin mentor-mentee
    public function index()
    {
        $mentorMenteeList = MentorMenteeList::all();  // Lấy tất cả dữ liệu từ bảng mentor_mentee_list
        return response()->json($mentorMenteeList);  // Trả về dữ liệu dưới dạng JSON
    }

    // Lấy thông tin mentor-mentee theo ID
    public function show($id)
    {
        $mentorMentee = MentorMenteeList::findOrFail($id);  // Tìm mentor-mentee theo ID
        return response()->json($mentorMentee);  // Trả về thông tin mentor-mentee dưới dạng JSON
    }

    // Tạo mới một mối quan hệ mentor-mentee
    public function store(Request $request)
    {
        // Xác thực dữ liệu đầu vào
        $request->validate([
            'mentee_id' => 'required|exists:mentee_info,id',  // Kiểm tra mentee_id có tồn tại trong bảng mentee_info
            'mentor_id' => 'required|exists:mentor_info,id',  // Kiểm tra mentor_id có tồn tại trong bảng mentor_info
        ]);

        // Tạo mới mối quan hệ mentor-mentee
        $mentorMentee = MentorMenteeList::create([
            'mentee_id' => $request->mentee_id,  // Lưu mentee_id
            'mentor_id' => $request->mentor_id,  // Lưu mentor_id
        ]);

        // Trả về thông tin mentor-mentee mới tạo
        return response()->json($mentorMentee, 201);  // Trả về mã 201 (Created)
    }

    // Cập nhật mối quan hệ mentor-mentee
    public function update(Request $request, $id)
    {
        // Tìm mentor-mentee theo ID
        $mentorMentee = MentorMenteeList::findOrFail($id);

        // Xác thực dữ liệu đầu vào
        $request->validate([
            'mentee_id' => 'required|exists:mentee_info,id',  // Kiểm tra mentee_id có tồn tại trong bảng mentee_info
            'mentor_id' => 'required|exists:mentor_info,id',  // Kiểm tra mentor_id có tồn tại trong bảng mentor_info
        ]);

        // Cập nhật mối quan hệ mentor-mentee
        $mentorMentee->update([
            'mentee_id' => $request->mentee_id,  // Cập nhật mentee_id
            'mentor_id' => $request->mentor_id,  // Cập nhật mentor_id
        ]);

        // Trả về thông tin mentor-mentee đã cập nhật
        return response()->json($mentorMentee);
    }

    // Xóa mối quan hệ mentor-mentee
    public function destroy($id)
    {
        // Tìm mentor-mentee theo ID
        $mentorMentee = MentorMenteeList::findOrFail($id);
        
        // Xóa mối quan hệ mentor-mentee
        $mentorMentee->delete();

        // Trả về mã trạng thái 204 (No Content) khi xóa thành công
        return response()->json(null, 204);
    }
}
