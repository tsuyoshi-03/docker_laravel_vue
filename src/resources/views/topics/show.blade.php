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
            <p class="card-text">投稿者：{{ $topic->user->name }}</p>
        </div>
    </div>
    <div class="card-footer text-muted">
        <p class="text-center">投稿日時：{{ $topic->created_at }}</p>
        <div class="d-flex justify-content-center">
            <div><a href="{{ route('topics.edit', $topic->id) }}" class="btn btn-primary">編集</a></div>
            <form action='{{ route('topics.destroy', $topic->id) }}' method='post'>
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
            <div>
                <input type='submit' value='削除' class="btn btn-danger" onclick='return confirm("削除しますか??");'>
            </div>
            </form>
        </div>
    </div>
</div>
@endsection
