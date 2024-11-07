<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    // Lấy tất cả các bình luận của một tài liệu
    public function index($documentId)
    {
        // Lấy tất cả bình luận của tài liệu với ID tương ứng
        $comments = Comment::where('document_id', $documentId)->get();
        return response()->json($comments);
    }

    // Tạo một bình luận mới
    public function store(Request $request)
    {
        // Xác thực dữ liệu đầu vào
        $request->validate([
            'document_id' => 'required|exists:community_documents,id',  // Kiểm tra document_id có tồn tại trong bảng community_documents
            'user_id' => 'required|exists:users,id',  // Kiểm tra user_id có tồn tại trong bảng users
            'content' => 'required|string',  // Kiểm tra content không được trống
        ]);

        // Tạo bình luận mới
        $comment = Comment::create([
            'document_id' => $request->document_id,
            'user_id' => $request->user_id,
            'content' => $request->content,
        ]);

        return response()->json($comment, 201);  // Trả về bình luận mới tạo với mã trạng thái 201 (Created)
    }

    // Cập nhật bình luận
    public function update(Request $request, $id)
    {
        // Tìm bình luận theo ID
        $comment = Comment::findOrFail($id);

        // Xác thực dữ liệu đầu vào
        $request->validate([
            'content' => 'required|string',  // Kiểm tra content không được trống
        ]);

        // Cập nhật bình luận
        $comment->update([
            'content' => $request->content,  // Cập nhật content
        ]);

        return response()->json($comment);  // Trả về bình luận đã cập nhật
    }

    // Xóa bình luận
    public function destroy($id)
    {
        // Tìm bình luận theo ID
        $comment = Comment::findOrFail($id);

        // Xóa bình luận
        $comment->delete();

        return response()->json(null, 204);  // Trả về mã trạng thái 204 (No Content) khi xóa thành công
    }
}
