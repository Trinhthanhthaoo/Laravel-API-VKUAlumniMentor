<?php

namespace App\Http\Controllers;

use App\Models\MenteeInfo;
use Illuminate\Http\Request;

class MenteeInfoController extends Controller
{
    // Lấy tất cả thông tin mentee
    public function index()
    {
        $menteeInfos = MenteeInfo::all();  // Lấy tất cả các bản ghi trong bảng mentee_info
        return response()->json($menteeInfos);  // Trả về các mentee_info dưới dạng JSON
    }

    // Lấy thông tin mentee theo ID
    public function show($id)
    {
        $menteeInfo = MenteeInfo::findOrFail($id);  // Tìm mentee theo id, nếu không tìm thấy trả về lỗi 404
        return response()->json($menteeInfo);  // Trả về mentee_info dưới dạng JSON
    }

    // Tạo mới một mentee_info
    public function store(Request $request)
    {
        // Xác thực dữ liệu đầu vào
        $request->validate([
            'user_id' => 'required|exists:users,id',  // Kiểm tra user_id phải tồn tại trong bảng users
            'gpa' => 'nullable|numeric|min:0|max:10',  // Kiểm tra GPA là một số từ 0 đến 10
            'achievements' => 'nullable|string',  // Kiểm tra achievements là chuỗi
            'goals' => 'nullable|string',  // Kiểm tra goals là chuỗi
        ]);

        // Tạo mới một bản ghi trong bảng mentee_info
        $menteeInfo = MenteeInfo::create([
            'user_id' => $request->user_id,  // Lưu user_id vào bảng mentee_info
            'gpa' => $request->gpa,  // Lưu GPA vào bảng mentee_info
            'achievements' => $request->achievements,  // Lưu achievements vào bảng mentee_info
            'goals' => $request->goals,  // Lưu goals vào bảng mentee_info
        ]);

        // Trả về mentee_info mới tạo với mã trạng thái 201 (Created)
        return response()->json($menteeInfo, 201);
    }

    // Cập nhật thông tin mentee_info
    public function update(Request $request, $id)
    {
        // Tìm mentee_info theo id, nếu không có thì trả về lỗi 404
        $menteeInfo = MenteeInfo::findOrFail($id);

        // Xác thực dữ liệu đầu vào
        $request->validate([
            'user_id' => 'required|exists:users,id',  // Kiểm tra user_id phải tồn tại trong bảng users
            'gpa' => 'nullable|numeric|min:0|max:10',  // Kiểm tra GPA là một số từ 0 đến 10
            'achievements' => 'nullable|string',  // Kiểm tra achievements là chuỗi
            'goals' => 'nullable|string',  // Kiểm tra goals là chuỗi
        ]);

        // Cập nhật thông tin mentee_info
        $menteeInfo->update([
            'user_id' => $request->user_id,  // Cập nhật user_id
            'gpa' => $request->gpa,  // Cập nhật GPA
            'achievements' => $request->achievements,  // Cập nhật achievements
            'goals' => $request->goals,  // Cập nhật goals
        ]);

        // Trả về mentee_info đã cập nhật
        return response()->json($menteeInfo);
    }

    // Xóa thông tin mentee_info
    public function destroy($id)
    {
        // Tìm mentee_info theo id, nếu không có thì trả về lỗi 404
        $menteeInfo = MenteeInfo::findOrFail($id);
        
        // Xóa mentee_info khỏi cơ sở dữ liệu
        $menteeInfo->delete();

        // Trả về mã trạng thái 204 (No Content) khi xóa thành công
        return response()->json(null, 204);
    }
}
