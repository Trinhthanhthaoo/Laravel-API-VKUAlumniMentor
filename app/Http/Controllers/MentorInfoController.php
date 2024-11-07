<?php

namespace App\Http\Controllers;

use App\Models\MentorInfo;
use Illuminate\Http\Request;

class MentorInfoController extends Controller
{
    // Lấy tất cả thông tin mentor
    public function index()
    {
        $mentorInfos = MentorInfo::all();  // Lấy tất cả các bản ghi trong bảng mentor_info
        return response()->json($mentorInfos);  // Trả về các mentor_info dưới dạng JSON
    }

    // Lấy thông tin mentor theo ID
    public function show($id)
    {
        $mentorInfo = MentorInfo::findOrFail($id);  // Tìm mentor theo id, nếu không tìm thấy trả về lỗi 404
        return response()->json($mentorInfo);  // Trả về mentor_info dưới dạng JSON
    }

    // Tạo mới một mentor_info
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',  // Kiểm tra user_id phải tồn tại trong bảng users
            'expertise' => 'nullable|string|max:255',  // Kiểm tra expertise là chuỗi tối đa 255 ký tự
            'organization' => 'nullable|string|max:100',  // Kiểm tra organization là chuỗi tối đa 100 ký tự
            'referral_source' => 'nullable|string|max:255',  // Kiểm tra referral_source là chuỗi tối đa 255 ký tự
            'suggestions_questions' => 'nullable|string',  // Kiểm tra suggestions_questions là chuỗi
            'achievements' => 'nullable|string',  // Kiểm tra achievements là chuỗi
        ]);

        $mentorInfo = MentorInfo::create([
            'user_id' => $request->user_id,  // Lưu user_id vào bảng mentor_info
            'expertise' => $request->expertise,  // Lưu expertise vào bảng mentor_info
            'organization' => $request->organization,  // Lưu organization vào bảng mentor_info
            'referral_source' => $request->referral_source,  // Lưu referral_source vào bảng mentor_info
            'suggestions_questions' => $request->suggestions_questions,  // Lưu suggestions_questions vào bảng mentor_info
            'achievements' => $request->achievements,  // Lưu achievements vào bảng mentor_info
        ]);

        return response()->json($mentorInfo, 201);  // Trả về mentor_info mới tạo với mã trạng thái 201 (Created)
    }

    // Cập nhật mentor_info
    public function update(Request $request, $id)
    {
        $mentorInfo = MentorInfo::findOrFail($id);  // Tìm mentor_info theo id, nếu không có thì trả về lỗi 404

        $request->validate([
            'user_id' => 'required|exists:users,id',  // Kiểm tra user_id phải tồn tại trong bảng users
            'expertise' => 'nullable|string|max:255',  // Kiểm tra expertise là chuỗi tối đa 255 ký tự
            'organization' => 'nullable|string|max:100',  // Kiểm tra organization là chuỗi tối đa 100 ký tự
            'referral_source' => 'nullable|string|max:255',  // Kiểm tra referral_source là chuỗi tối đa 255 ký tự
            'suggestions_questions' => 'nullable|string',  // Kiểm tra suggestions_questions là chuỗi
            'achievements' => 'nullable|string',  // Kiểm tra achievements là chuỗi
        ]);

        $mentorInfo->update([
            'user_id' => $request->user_id,  // Cập nhật user_id trong bảng mentor_info
            'expertise' => $request->expertise,  // Cập nhật expertise trong bảng mentor_info
            'organization' => $request->organization,  // Cập nhật organization trong bảng mentor_info
            'referral_source' => $request->referral_source,  // Cập nhật referral_source trong bảng mentor_info
            'suggestions_questions' => $request->suggestions_questions,  // Cập nhật suggestions_questions trong bảng mentor_info
            'achievements' => $request->achievements,  // Cập nhật achievements trong bảng mentor_info
        ]);

        return response()->json($mentorInfo);  // Trả về mentor_info đã cập nhật
    }

    // Xóa mentor_info
    public function destroy($id)
    {
        $mentorInfo = MentorInfo::findOrFail($id);  // Tìm mentor_info theo id, nếu không có thì trả về lỗi 404
        $mentorInfo->delete();  // Xóa mentor_info khỏi cơ sở dữ liệu

        return response()->json(null, 204);  // Trả về mã trạng thái 204 (No Content) khi xóa thành công
    }
}
