<?php

namespace App\Http\Controllers;

use App\Models\CompetitionRegistration;
use Illuminate\Http\Request;

class CompetitionRegistrationController extends Controller
{
    // Lấy tất cả các đăng ký tham gia cuộc thi
    public function index()
    {
        $registrations = CompetitionRegistration::all();  // Lấy tất cả các đăng ký từ bảng competitions_registrations
        return response()->json($registrations);  // Trả về dưới dạng JSON
    }

    // Lấy đăng ký tham gia cuộc thi theo ID
    public function show($id)
    {
        $registration = CompetitionRegistration::findOrFail($id);  // Tìm đăng ký theo ID
        return response()->json($registration);  // Trả về đăng ký dưới dạng JSON
    }

    // Đăng ký tham gia cuộc thi mới
    public function store(Request $request)
    {
        // Xác thực dữ liệu đầu vào
        $request->validate([
            'competition_id' => 'required|exists:competitions,id',
            'mentee_id' => 'required|exists:mentee_info,id',
            'user_id' => 'required|exists:users,id',
        ]);

        // Tạo mới đăng ký
        $registration = CompetitionRegistration::create([
            'competition_id' => $request->competition_id,
            'mentee_id' => $request->mentee_id,
            'user_id' => $request->user_id,
        ]);

        return response()->json($registration, 201);  // Trả về đăng ký mới tạo với mã trạng thái 201
    }

    // Cập nhật thông tin đăng ký
    public function update(Request $request, $id)
    {
        // Tìm đăng ký theo ID
        $registration = CompetitionRegistration::findOrFail($id);

        // Xác thực và cập nhật dữ liệu
        $request->validate([
            'competition_id' => 'required|exists:competitions,id',
            'mentee_id' => 'required|exists:mentee_info,id',
            'user_id' => 'required|exists:users,id',
        ]);

        $registration->update([
            'competition_id' => $request->competition_id,
            'mentee_id' => $request->mentee_id,
            'user_id' => $request->user_id,
        ]);

        return response()->json($registration);  // Trả về đăng ký đã cập nhật
    }

    // Xóa đăng ký
    public function destroy($id)
    {
        // Tìm đăng ký theo ID
        $registration = CompetitionRegistration::findOrFail($id);

        // Xóa đăng ký
        $registration->delete();

        return response()->json(null, 204);  // Trả về mã trạng thái 204 khi xóa thành công
    }
}
