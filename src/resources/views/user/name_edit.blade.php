@extends('layouts.app')
@section('content')
<div class="container m-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">アカウント</div>
                <div class="card-body">
                    <form action="{{ route('name.update', $user) }}" method="POST">
                        {{csrf_field()}}
                        {{method_field('PUT')}}
                        <div class="form-group">
                            <label for="name">ニックネーム</label>
                            <div>
                                <input class="form-control" value="{{ $user->name }}" name="name">
                                @error('name')
                                    {{-- <div class="alert alert-danger">{{ $message }}</div> --}}
                                    <div class="alert alert-danger">入力値が不正です</div>
                                @enderror
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
