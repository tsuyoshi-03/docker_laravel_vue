@extends('layouts.app')
@section('content')
<div class="container">
    <div class="card-header">
        投稿一覧
    </div>
    @foreach ($topics as $topic)
    <div class="card text-center">
        <div class="card-body">
            <h5 class="card-title">タイトル：{{ $topic->title }}</h5>
            <p class="card-text">内容：{{ $topic->contents }}</p>
            <p class="card-text">投稿者：{{ $topic->user->name }}</p>
            <a href="{{ route('topics.show', $topic) }}" class="btn btn-primary">詳細へ</a>
        </div>
        <div class="card-footer text-muted">
            投稿日時：{{ $topic->created_at->format('Y年m月d日 H時i分') }}
        </div>
    </div>
    @endforeach
</div>
@endsection
