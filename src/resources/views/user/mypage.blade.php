@extends('layouts.app')
@section('content')
<div class="container m-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">アカウント</div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">ニックネーム：</label>
                        <p style="margin: 0px 0px 5px 0px">{{ $user->name }}</p>
                        <a href="{{ route('name.edit', $user) }}">編集</a>
                    </div>
                    <div class="form-group">
                        <label for="email">メールアドレス：</label>
                        <p>{{ $user->email }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
