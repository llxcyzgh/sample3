<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use Auth;
use Illuminate\Support\Facades\Auth;

class SessionsController extends Controller
{
    // 显示用户登陆界面
    public function create()
    {
        return view('sessions.create');
    }

    // 执行用户登陆动作[email+password]
    public function store(Request $request)
    {
//        var_dump($request->toArray());
//        exit('123');
        $credentials = $this->validate($request, [
            'email'    => 'required|email|max:100',
            'password' => 'required|min:6|max:30',
        ]);

//        if (Auth::attempt($credentials, $request->has('remember_me'))) {
        if (Auth::attempt($credentials, $request->remember_me)) {
            session()->flash('success', '登陆成功');
            return redirect()->route('users.show', [Auth::user()]);
        } else {
            session()->flash('danger', '账号密码不匹配');
            return back();
        }
    }

    // 执行用户退出动作
    public function destroy()
    {
        Auth::logout();
        session()->flash('success', '成功退出~');
        return redirect('login');
//        return redirect()->route('login');
    }
}
