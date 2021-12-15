@extends('layouts.app')
@section('content')
<div class="container">
	<p>新規投稿画面だよ</p>
    <div class="col-md-8">
        <form action="{{ route('topics.store') }}" method="POST">
        {{csrf_field()}}
            <div class="form-group">
                <label>タイトル</label>
                <input type="text" class="form-control" placeholder="タイトルを入力して下さい" name="title">
            </div>
            <div class="form-group">
                <label>内容</label>
                <textarea class="form-control" placeholder="内容" rows="5" name="body"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">作成する</button>
        </form>
    </div>
</div>
@endsection
