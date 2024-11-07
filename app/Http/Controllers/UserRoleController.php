<?php

namespace App\Http\Controllers;

use App\Models\UserRole;
use Illuminate\Http\Request;

class UserRoleController extends Controller
{
    // Lấy tất cả user_roles
    public function index()
    {
        $userRoles = UserRole::all();  // Lấy tất cả các bản ghi trong bảng user_roles
        return response()->json($userRoles);  // Trả về các user_roles dưới dạng JSON
    }

    // Lấy thông tin user_role theo id
    public function show($id)
    {
        $userRole = UserRole::findOrFail($id);  // Tìm kiếm user_role theo id, nếu không tìm thấy sẽ trả về lỗi 404
        return response()->json($userRole);  // Trả về user_role dưới dạng JSON
    }

    // Tạo mới user_role
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',  // Kiểm tra user_id phải tồn tại trong bảng users
            'role_id' => 'required|exists:roles,id',  // Kiểm tra role_id phải tồn tại trong bảng roles
        ]);

        $userRole = UserRole::create([
            'user_id' => $request->user_id,  // Lưu user_id vào bảng user_roles
            'role_id' => $request->role_id,  // Lưu role_id vào bảng user_roles
        ]);

        return response()->json($userRole, 201);  // Trả về user_role mới tạo cùng với mã trạng thái 201 (Created)
    }

    // Cập nhật user_role
    public function update(Request $request, $id)
    {
        $userRole = UserRole::findOrFail($id);  // Tìm user_role theo id, nếu không có thì trả về lỗi 404

        $request->validate([
            'user_id' => 'required|exists:users,id',  // Kiểm tra user_id phải tồn tại trong bảng users
            'role_id' => 'required|exists:roles,id',  // Kiểm tra role_id phải tồn tại trong bảng roles
        ]);

        $userRole->update([
            'user_id' => $request->user_id,  // Cập nhật user_id trong bảng user_roles
            'role_id' => $request->role_id,  // Cập nhật role_id trong bảng user_roles
        ]);

        return response()->json($userRole);  // Trả về user_role đã cập nhật
    }

    // Xóa user_role
    public function destroy($id)
    {
        $userRole = UserRole::findOrFail($id);  // Tìm user_role theo id, nếu không có thì trả về lỗi 404
        $userRole->delete();  // Xóa user_role khỏi cơ sở dữ liệu

        return response()->json(null, 204);  // Trả về mã trạng thái 204 (No Content) khi xóa thành công
    }
}
