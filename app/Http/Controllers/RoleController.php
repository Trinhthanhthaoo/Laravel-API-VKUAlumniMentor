<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    // Lấy tất cả các roles
    public function index()
    {
        $roles = Role::all();  // Lấy tất cả các bản ghi trong bảng roles
        return response()->json($roles);  // Trả về các roles dưới dạng JSON
    }

    // Lấy thông tin role theo id
    public function show($id)
    {
        $role = Role::findOrFail($id);  // Tìm kiếm role theo id, nếu không tìm thấy thì trả về lỗi 404
        return response()->json($role);  // Trả về role dưới dạng JSON
    }

    // Tạo mới role
    public function store(Request $request)
    {
        $request->validate([
            'role_name' => 'required|string|max:50|unique:roles,role_name',  // Xác thực dữ liệu đầu vào
        ]);

        $role = Role::create([
            'role_name' => $request->role_name,  // Tạo role mới với tên vai trò
        ]);

        return response()->json($role, 201);  // Trả về role mới tạo cùng với mã trạng thái 201 (Created)
    }

    // Cập nhật role
    public function update(Request $request, $id)
    {
        $role = Role::findOrFail($id);  // Tìm role theo id, nếu không có thì trả về lỗi 404

        $request->validate([
            'role_name' => 'required|string|max:50|unique:roles,role_name,' . $role->id,  // Xác thực tên vai trò
        ]);

        $role->update([
            'role_name' => $request->role_name,  // Cập nhật tên vai trò
        ]);

        return response()->json($role);  // Trả về role đã cập nhật
    }

    // Xóa role
    public function destroy($id)
    {
        $role = Role::findOrFail($id);  // Tìm role theo id, nếu không có thì trả về lỗi 404
        $role->delete();  // Xóa role khỏi cơ sở dữ liệu

        return response()->json(null, 204);  // Trả về mã trạng thái 204 (No Content) khi xóa thành công
    }
}
