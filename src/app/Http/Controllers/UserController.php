<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function mypage()
    {
        return view('user.mypage', ['user' => Auth::user() ]);
    }

    public function show(User $user)
    {
        return view('user.show', compact('user'));
    }

    public function name_edit(User $user)
    {
        return view('user.name_edit',compact('user'));
    }

    public function name_update(Request $request, User $user)
    {
        //ユーザー登録と同じバリデーションをかけたい
        $user->fill($request->all())->save();
        return redirect()->route('user.mypage');
    }

    public function email_update(Request $request, User $user)
    {
        //ユーザー登録と同じバリデーションをかけたい
        //DB保存
        //メール送信
        Auth::logout();
        return redirect()->route('login');
    }

    public function password_update(Request $request, User $user)
    {
        //ユーザー登録と同じバリデーションをかけたい
        //DB保存
        //メール送信
        Auth::logout();
        return redirect()->route('login');
    }
}
