@extends('layouts.app')
@section('content')
<div class="container">
	<p>ログイン後のトップページだよ</p>
    <div>
        <a href="{{ route('topics.create') }}">新規投稿</a>
    </div>
</div>
@endsection
