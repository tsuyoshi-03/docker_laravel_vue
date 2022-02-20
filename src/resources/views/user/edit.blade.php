@extends('layouts.app')
@section('content')
<div class="container m-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">ユーザー登録内容</div>
                <div class="card-body">
                    <form action="{{ route('user.update', $user) }}" method="POST">
                        {{csrf_field()}}
                        {{method_field('PUT')}}
                        <div class="form-group">
                            <label for="name">ニックネーム</label>
                            <div>
                                <input class="form-control" value="{{ $user->name }}" name="name">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email">email</label>
                            <div>
                                <input class="form-control" value="{{ $user->email }}" name="email">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">更新する</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
