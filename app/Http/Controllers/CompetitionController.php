<?php

namespace App\Http\Controllers;

use App\Models\Competition;
use Illuminate\Http\Request;

class CompetitionController extends Controller
{
    // Lấy tất cả các cuộc thi
    public function index()
    {
        $competitions = Competition::all();  // Lấy tất cả các cuộc thi từ bảng competitions
        return response()->json($competitions);  // Trả về dưới dạng JSON
    }

    // Lấy thông tin cuộc thi theo ID
    public function show($id)
    {
        $competition = Competition::findOrFail($id);  // Tìm cuộc thi theo ID
        return response()->json($competition);  // Trả về cuộc thi dưới dạng JSON
    }

    // Tạo cuộc thi mới
    public function store(Request $request)
    {
        // Xác thực dữ liệu đầu vào
        $request->validate([
            'mentor_id' => 'required|exists:mentor_info,id',  // Kiểm tra mentor_id có tồn tại trong bảng mentor_info
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',  // Kiểm tra end_date phải lớn hơn hoặc bằng start_date
        ]);

        // Tạo mới cuộc thi
        $competition = Competition::create([
            'mentor_id' => $request->mentor_id,
            'title' => $request->title,
            'description' => $request->description,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
        ]);

        return response()->json($competition, 201);  // Trả về cuộc thi mới tạo với mã trạng thái 201
    }

    // Cập nhật cuộc thi
    public function update(Request $request, $id)
    {
        // Tìm cuộc thi theo ID
        $competition = Competition::findOrFail($id);

        // Xác thực dữ liệu đầu vào
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',  // Kiểm tra end_date phải lớn hơn hoặc bằng start_date
        ]);

        // Cập nhật thông tin cuộc thi
        $competition->update([
            'title' => $request->title,
            'description' => $request->description,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
        ]);

        return response()->json($competition);  // Trả về cuộc thi đã được cập nhật
    }

    // Xóa cuộc thi
    public function destroy($id)
    {
        // Tìm cuộc thi theo ID
        $competition = Competition::findOrFail($id);

        // Xóa cuộc thi
        $competition->delete();

        return response()->json(null, 204);  // Trả về mã trạng thái 204 khi xóa thành công
    }
}
