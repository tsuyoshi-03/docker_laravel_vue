@extends('layouts.app')
@section('content')
<div class="container">
	<p>ログイン後のトップページだよ</p>
    <div>
        <a href="{{ route('topics.create') }}">新規投稿</a>
    </div>
    <div class="card-header">
        投稿一覧
    </div>
    @foreach ($topics as $topic)
    <div class="card text-center">
        <div class="card-body">
            <h5 class="card-title">タイトル：{{ $topic->title }}</h5>
            <p class="card-text">内容：{{ $topic->contents }}</p>
            <a href="#" class="btn btn-primary">詳細へ</a>
        </div>
        <div class="card-footer text-muted">
            投稿日時：{{ $topic->created_at }}
        </div>
    </div>
    @endforeach
</div>
@endsection
