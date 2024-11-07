<?php

namespace App\Http\Controllers;

use App\Models\MentorRating;
use Illuminate\Http\Request;

class MentorRatingController extends Controller
{
    // Lấy tất cả các đánh giá của mentor
    public function index()
    {
        $ratings = MentorRating::all();  // Lấy tất cả các đánh giá từ bảng mentor_ratings
        return response()->json($ratings);  // Trả về dưới dạng JSON
    }

    // Lấy đánh giá theo ID
    public function show($id)
    {
        $rating = MentorRating::findOrFail($id);  // Tìm đánh giá theo ID
        return response()->json($rating);  // Trả về đánh giá dưới dạng JSON
    }

    // Lưu đánh giá mới
    public function store(Request $request)
    {
        // Xác thực dữ liệu đầu vào
        $request->validate([
            'mentee_id' => 'required|exists:mentee_info,id',
            'rating' => 'required|numeric|min:1|max:5',
            'comments' => 'nullable|string',
        ]);

        // Tạo mới đánh giá
        $rating = MentorRating::create([
            'mentee_id' => $request->mentee_id,
            'rating' => $request->rating,
            'comments' => $request->comments,
        ]);

        return response()->json($rating, 201);  // Trả về đánh giá mới tạo với mã trạng thái 201
    }

    // Cập nhật đánh giá
    public function update(Request $request, $id)
    {
        // Tìm đánh giá theo ID
        $rating = MentorRating::findOrFail($id);

        // Xác thực và cập nhật dữ liệu
        $request->validate([
            'rating' => 'required|numeric|min:1|max:5',
            'comments' => 'nullable|string',
        ]);

        $rating->update([
            'rating' => $request->rating,
            'comments' => $request->comments,
        ]);

        return response()->json($rating);  // Trả về đánh giá đã cập nhật
    }

    // Xóa đánh giá
    public function destroy($id)
    {
        // Tìm đánh giá theo ID
        $rating = MentorRating::findOrFail($id);

        // Xóa đánh giá
        $rating->delete();

        return response()->json(null, 204);  // Trả về mã trạng thái 204 khi xóa thành công
    }
}
