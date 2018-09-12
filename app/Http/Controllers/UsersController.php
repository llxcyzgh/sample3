<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UsersController extends Controller
{
    // 显示全体用户页面
    public function index()
    {
        $users = User::all();
        return view('users.index',compact('users'));
    }

    // 显示用户注册页面
    public function create()
    {
        return view('users.create');
    }

    // 显示个人用户页面
    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    // 执行用户注册动作, 注册成功返回个人用户界面,注册失败返回注册页面
    public function store(Request $request)
    {
//        var_dump($request->toArray());

        $this->validate($request, [
            'name'     => ['required', 'min:5', 'max:30',
                function ($attribute, $value, $fail) {
                    if (!preg_match('/^[a-zA-Z_]+/', $value)) {
//                        return $fail('用户名由字母,数字,下划线组成,且不能以数字开头');
                        return $fail('用户名 格式不正确');
                    }
                }
            ],
//            'name'     => ['required', 'min:5', 'max:30', 'regex:/^[a-zA-Z_]+/'],
            'email'    => 'required|email|unique:users',
            'password' => 'required|min:6|max:30|confirmed',
        ]);

        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => bcrypt($request->password),
        ]);

        session()->flash('success', '注册成功');
        return redirect()->route('users.show', [$user]);
    }

    // 显示用户编辑页面
    public function edit()
    {
        return view('users.edit');
    }

    // 执行用户编辑动作
    public function update()
    {
//        return view('users.create');
    }

    // 执行用户删除动作
    public function destroy()
    {

    }


}
