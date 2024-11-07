<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use Illuminate\Http\Request;

class ContactMessageController extends Controller
{
    // Lấy tất cả các tin nhắn
    public function index()
    {
        $messages = ContactMessage::all();  // Lấy tất cả các tin nhắn từ bảng contact_messages
        return response()->json($messages);  // Trả về dưới dạng JSON
    }

    // Lấy tin nhắn theo ID
    public function show($id)
    {
        $message = ContactMessage::findOrFail($id);  // Tìm tin nhắn theo ID
        return response()->json($message);  // Trả về tin nhắn dưới dạng JSON
    }

    // Lưu tin nhắn mới
    public function store(Request $request)
    {
        // Xác thực dữ liệu đầu vào
        $request->validate([
            'username' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'content' => 'required|string',
        ]);

        // Tạo mới tin nhắn
        $message = ContactMessage::create([
            'username' => $request->username,
            'email' => $request->email,
            'content' => $request->content,
        ]);

        return response()->json($message, 201);  // Trả về tin nhắn mới tạo với mã trạng thái 201
    }

    // Xóa tin nhắn
    public function destroy($id)
    {
        // Tìm tin nhắn theo ID
        $message = ContactMessage::findOrFail($id);

        // Xóa tin nhắn
        $message->delete();

        return response()->json(null, 204);  // Trả về mã trạng thái 204 khi xóa thành công
    }
}
