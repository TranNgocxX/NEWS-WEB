@extends('layouts.app')

@section('content')
    <h2>{{ $article->TieuDe }}</h2>
    <p>{{ $article->NoiDung }}</p>
    <a href="{{ route('articles.index') }}" class="btn btn-secondary">Trở lại danh sách</a>
@endsection
