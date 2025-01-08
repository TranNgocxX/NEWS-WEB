@extends('layouts.app')

@section('content')
    <h2>Danh sách bài viết</h2>
    <a href="{{ route('articles.create') }}" class="btn btn-success mb-3">Tạo bài viết mới</a>

    @foreach($articles as $article)
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title">{{ $article->TieuDe }}</h5>
                <p class="card-text">{{ Str::limit($article->NoiDung, 100) }}</p>
                <a href="{{ route('articles.show', $article->MaBaiViet) }}" class="btn btn-primary">Xem chi tiết</a>
                <a href="{{ route('articles.edit', $article->MaBaiViet) }}" class="btn btn-warning">Chỉnh sửa</a>
                <form action="{{ route('articles.destroy', $article->MaBaiViet) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Xóa</button>
                </form>
            </div>
        </div>
    @endforeach
@endsection
