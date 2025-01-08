<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    // Hiển thị danh sách bài viết
    public function index()
    {
        $articles = Article::all();
        return view('articles.index', compact('articles'));
    }

    // Hiển thị form tạo bài viết mới
    public function create()
    {
        $categories = Category::all();
        return view('articles.create', compact('categories'));
    }

    // Lưu bài viết mới vào cơ sở dữ liệu
    public function store(Request $request)
    {
        // Xác thực dữ liệu đầu vào
        $request->validate([
            'TieuDe' => 'required|max:255',
            'NoiDung' => 'required',
            'MaDanhMuc' => 'required|exists:categories,MaDanhMuc'  // Kiểm tra xem danh mục có tồn tại trong bảng categories không
        ]);

        // Tạo mới bài viết
        Article::create([
            'TieuDe' => $request->TieuDe,
            'NoiDung' => $request->NoiDung,
            'MaTacGia' => Auth::id(),
            'MaDanhMuc' => $request->MaDanhMuc
        ]);

        return redirect()->route('articles.index');
    }

    // Hiển thị form chỉnh sửa bài viết
    public function edit($MaBaiViet)
    {
        // Tìm bài viết theo MaBaiViet
        $article = Article::where('MaBaiViet', $MaBaiViet)->firstOrFail();
        
        // Lấy danh sách danh mục để hiển thị trong form
        $categories = Category::all();
        return view('articles.edit', compact('article', 'categories'));
    }

    public function update(Request $request, Article $article)
    {
        // Xác thực dữ liệu
        $request->validate([
            'TieuDe' => 'required|max:255',
            'NoiDung' => 'required',
            'MaDanhMuc' => 'required|exists:categories,MaDanhMuc'
        ]);
    
        // Cập nhật bài viết
        $article->update([
            'TieuDe' => $request->TieuDe,
            'NoiDung' => $request->NoiDung,
            'MaDanhMuc' => $request->MaDanhMuc,
            'NgayCapNhat' => now(), // Cập nhật ngày chỉnh sửa
        ]);
    
        // Chuyển hướng về danh sách bài viết
        return redirect()->route('articles.index');
    }
    

    // Hiển thị chi tiết bài viết
    public function show($MaBaiViet)
    {
        // Tìm bài viết theo MaBaiViet
        $article = Article::where('MaBaiViet', $MaBaiViet)->firstOrFail();
        return view('articles.show', compact('article'));
    }

    // Xóa bài viết
    public function destroy($MaBaiViet)
    {
        // Tìm bài viết theo MaBaiViet
        $article = Article::where('MaBaiViet', $MaBaiViet)->firstOrFail();
        
        // Xóa bài viết
        $article->delete();

        return redirect()->route('articles.index');
    }
}
