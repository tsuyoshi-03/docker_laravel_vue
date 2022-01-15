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
        <p class="text-center">投稿日時：{{ $topic->created_at->format('Y年m月d日 H:i') }}</p>
        {{-- @if( Auth::id() ===  $topic->user_id ) --}}
        @if( Auth::user()->id ===  $topic->user_id )
            <div class="d-flex justify-content-center">
                <div><a href="{{ route('topics.edit', $topic) }}" class="btn btn-primary">編集</a></div>
                <form action='{{ route('topics.destroy', $topic) }}' method='post'>
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                <div>
                    <input type='submit' value='削除' class="btn btn-danger" onclick='return confirm("削除しますか??");'>
                </div>
                </form>
            </div>
        @endif
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form action="{{ route('topics.comments.store', $topic) }}" method="POST">
            {{csrf_field()}}
                <input type="hidden" name="topic_id" value="{{ $topic->id }}">
                <div class="form-group">
                    <label>コメント</label>
                    <textarea class="form-control" placeholder="内容" rows="5" name="contents"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">コメントする</button>
            </form>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            @foreach ($topic->comments as $comment)
            <div class="card mt-3">
                <h5 class="card-header">投稿者：{{ $comment->user->name }}</h5>
                <div class="card-body">
                    <h5 class="card-text">{{ $comment->contents }}</h5>
                    <p class="card-title">投稿日時：{{ $comment->created_at->format('Y年m月d日 H:i') }}</p>
                </div>
                {{-- @if( Auth::id() ===  $comment->user_id ) --}}
                @if( Auth::user()->id ===  $comment->user_id )
                    <div class="d-flex justify-content-center">
                        <div><a href="{{ route('topics.comments.edit', ['topic'=>$topic, 'comment'=>$comment,]) }}" class="btn btn-primary">編集</a></div>
                        <form action='{{ route('topics.comments.destroy', ['topic'=>$topic, 'comment'=>$comment,]) }}' method='post'>
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                        <div>
                            <input type='submit' value='削除' class="btn btn-danger" onclick='return confirm("コメントを削除しますか??");'>
                        </div>
                        </form>
                    </div>
                @endif
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
