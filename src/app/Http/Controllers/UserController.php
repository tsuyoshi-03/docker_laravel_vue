<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Models\Topic;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function mypage()
    {
        return view('user.mypage', ['user' => Auth::user() ]);
    }

    public function show(User $user, Request $request)
    {
        $search = $request->input('search');
        $topics = Topic::extractTopics($search, $user->id);
        return view('user.show', compact('user','topics'));
    }

    public function name_edit(User $user)
    {
        $this->authorize('update', $user);
        return view('user.name_edit',compact('user'));
    }

    public function name_update(Request $request, User $user)
    {
        $this->authorize('update', $user);
        $request->validate(['name' => ['required', 'string', 'max:255'],]);
        $user->update($request->only(['name']));
        return redirect()->route('user.mypage');
    }

    public function email_edit(User $user)
    {
        $this->authorize('update', $user);
        return view('user.email_edit',compact('user'));
    }

    public function email_update(Request $request, User $user)
    {
        $this->authorize('update', $user);
        $request->validate(['email' => ['required', 'string', 'email', 'max:255', 'unique:users'],]);
        //メール認証OKであれば
        $user->update(['email' => $request->email]);
        Auth::logout();
        return redirect()->route('login');
    }

    public function password_edit(User $user)
    {
        $this->authorize('update', $user);
        return view('user.password_edit',compact('user'));
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
