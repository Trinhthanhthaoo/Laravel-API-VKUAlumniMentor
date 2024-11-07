<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // Hiển thị danh sách tất cả người dùng
    public function index()
    {
        $users = User::all();
        return response()->json($users);
    }

    // Hiển thị chi tiết người dùng theo ID
    public function show($id)
    {
        $user = User::findOrFail($id);
        return response()->json($user);
    }

    // Tạo người dùng mới
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        return response()->json($user, 201);
    }

    // Cập nhật thông tin người dùng
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'name' => 'string|max:255',
            'email' => 'email|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8',
        ]);

        $user->update([
            'name' => $request->name ?? $user->name,
            'email' => $request->email ?? $user->email,
            'password' => $request->password ? bcrypt($request->password) : $user->password,
        ]);

        return response()->json($user);
    }

    // Xóa người dùng
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return response()->json(null, 204);
    }
}
