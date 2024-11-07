<?php

namespace App\Http\Controllers;

use App\Models\CommunityDocument;
use Illuminate\Http\Request;

class CommunityDocumentController extends Controller
{
    // Lấy tất cả các tài liệu cộng đồng
    public function index()
    {
        $documents = CommunityDocument::all();  // Lấy tất cả các tài liệu từ bảng community_documents
        return response()->json($documents);  // Trả về danh sách tài liệu dưới dạng JSON
    }

    // Lấy tài liệu cộng đồng theo ID
    public function show($id)
    {
        $document = CommunityDocument::findOrFail($id);  // Tìm tài liệu theo ID
        return response()->json($document);  // Trả về thông tin tài liệu dưới dạng JSON
    }

    // Tạo mới một tài liệu cộng đồng
    public function store(Request $request)
    {
        // Xác thực dữ liệu đầu vào
        $request->validate([
            'mentor_id' => 'nullable|exists:mentor_info,id',  // Kiểm tra mentor_id có tồn tại trong bảng mentor_info
            'mentee_id' => 'nullable|exists:mentee_info,id',  // Kiểm tra mentee_id có tồn tại trong bảng mentee_info
            'title' => 'required|string|max:255',  // Kiểm tra title không được trống và không quá 255 ký tự
            'content' => 'required|string',  // Kiểm tra content không được trống
            'status' => 'required|in:pending,approved,rejected',  // Kiểm tra status phải là 'pending', 'approved' hoặc 'rejected'
        ]);

        // Tạo mới tài liệu cộng đồng
        $document = CommunityDocument::create([
            'mentor_id' => $request->mentor_id,  // Lưu mentor_id
            'mentee_id' => $request->mentee_id,  // Lưu mentee_id
            'title' => $request->title,  // Lưu title
            'content' => $request->content,  // Lưu content
            'status' => $request->status,  // Lưu status
        ]);

        // Trả về tài liệu cộng đồng mới tạo dưới dạng JSON
        return response()->json($document, 201);  // Trả về mã 201 (Created)
    }

    // Cập nhật tài liệu cộng đồng
    public function update(Request $request, $id)
    {
        // Tìm tài liệu cộng đồng theo ID
        $document = CommunityDocument::findOrFail($id);

        // Xác thực dữ liệu đầu vào
        $request->validate([
            'mentor_id' => 'nullable|exists:mentor_info,id',  // Kiểm tra mentor_id có tồn tại trong bảng mentor_info
            'mentee_id' => 'nullable|exists:mentee_info,id',  // Kiểm tra mentee_id có tồn tại trong bảng mentee_info
            'title' => 'required|string|max:255',  // Kiểm tra title không được trống và không quá 255 ký tự
            'content' => 'required|string',  // Kiểm tra content không được trống
            'status' => 'required|in:pending,approved,rejected',  // Kiểm tra status phải là 'pending', 'approved' hoặc 'rejected'
        ]);

        // Cập nhật tài liệu cộng đồng
        $document->update([
            'mentor_id' => $request->mentor_id,  // Cập nhật mentor_id
            'mentee_id' => $request->mentee_id,  // Cập nhật mentee_id
            'title' => $request->title,  // Cập nhật title
            'content' => $request->content,  // Cập nhật content
            'status' => $request->status,  // Cập nhật status
        ]);

        // Trả về tài liệu cộng đồng đã cập nhật dưới dạng JSON
        return response()->json($document);
    }

    // Xóa tài liệu cộng đồng
    public function destroy($id)
    {
        // Tìm tài liệu cộng đồng theo ID
        $document = CommunityDocument::findOrFail($id);

        // Xóa tài liệu cộng đồng
        $document->delete();

        // Trả về mã trạng thái 204 (No Content) khi xóa thành công
        return response()->json(null, 204);
    }
}
