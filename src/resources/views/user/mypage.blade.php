@extends('layouts.app')
@section('content')
<div class="container m-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">アカウント</div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">ニックネーム</label>
                        <div>
                            <input type="text" readonly class="form-control-plaintext" value="{{ $user->name }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email">email</label>
                        <div>
                            <input type="text" readonly class="form-control-plaintext" value="{{ $user->email }}">
                        </div>
                    </div>
                    <a href="{{ route('user.edit', $user) }}"><button class="btn btn-primary">ユーザー登録内容の編集</button></a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
