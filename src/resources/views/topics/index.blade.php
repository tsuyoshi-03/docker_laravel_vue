@extends('layouts.app')
@section('content')
<div class="container">
    <div style="margin: 10px;">
        <form class="form-inline" action="{{ route('topics.index') }}">
            <input class="form-control mr-sm-2" type="text"　name="search" placeholder="キーワード">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">検索</button>
        </form>
    </div>
    <div class="card-header">
        投稿一覧
    </div>
    @if($topics->count())
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
        <div class="d-flex justify-content-center" style="margin: 15px;">
            {{ $topics->links() }}
        </div>
    @else
        <p style="text-align: center">投稿が見つかりませんでした</p>
    @endif
</div>
@endsection
