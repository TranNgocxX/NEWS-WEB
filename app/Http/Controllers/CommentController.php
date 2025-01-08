<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'MaBaiViet' => 'required|exists:articles,id',
            'MaNguoiDung' => 'required|exists:users,MaNguoiDung',
            'NoiDung' => 'required',
        ]);

        Comment::create($validated);

        return redirect()->back()->with('success', 'Bình luận đã được thêm.');
    }

    public function destroy($id)
    {
        $comment = Comment::findOrFail($id);
        $comment->delete();

        return redirect()->back()->with('success', 'Bình luận đã được xóa.');
    }
}
