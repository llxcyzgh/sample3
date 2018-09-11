<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    // 显示用户注册页面
    public function create()
    {
        return view('users.create');
    }

    // 显示全体用户页面
    public function show()
    {
        return view('users.show');
    }

    // 执行用户注册动作
    public function store()
    {
//        return view('users.create');
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
