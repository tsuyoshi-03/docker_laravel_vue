@extends('layouts.app')
@section('content')
<div class="container">
    <div class="card-header">
        投稿詳細
    </div>
    <div class="card text-center">
        <div class="card-body">
            <h5>タイトル：{{ $topic->title }}</h5>
            <p class="card-text">内容：{{ $topic->contents }}</p>
        </div>
        <div class="card-footer text-muted">
            <p>投稿日時：{{ $topic->created_at }}</p>
        </div>
    </div>
</div>
@endsection
