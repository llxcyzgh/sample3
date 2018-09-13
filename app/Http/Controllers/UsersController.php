<?php

namespace App\Http\Controllers;

use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Request;
use App\Models\User;
//use Auth;
use Illuminate\Support\Facades\Auth;

//use Mockery\Exception;

class UsersController extends Controller
{
    public function __construct()
    {
//        $this->middleware('auth', [
//            'except' => ['index', 'show', 'create', 'store'],
//        ]);
        $this->middleware('auth')->except(['index', 'show', 'create', 'store']);
        $this->middleware('guest')->only(['create']);
    }

    // 显示全体用户页面
    public function index()
    {
        $users = User::paginate(10);// 默认 id 升序分页
//        $users = User::orderBy('created_at','desc')->paginate(10);
//        $users = User::orderBy('created_at', 'asc')->paginate(10);
        return view('users.index', compact('users'));
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
            'email'    => 'required|email|max:100|unique:users',
            'password' => 'required|min:6|max:30|confirmed',
        ]);

        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => bcrypt($request->password),
        ]);

        Auth::login($user);
        session()->flash('success', '注册成功');
        return redirect()->route('users.show', [$user]);
    }

    // 显示用户编辑页面
    public function edit(User $user)
    {
        try {
            $this->authorize('update', $user);
//        } catch (AuthorizationException $e) {
        } catch (AuthorizationException $e) {
            return abort(403, '无权访问');
//            return abort(403);
        }

        return view('users.edit', compact('user'));
    }

    // 执行用户编辑动作
    public function update(Request $request, User $user)
    {
//        var_dump($request->toArray());
        try {
            $this->authorize('update', $user);
        } catch (AuthorizationException $e) {
            return abort(403, '无权访问');
        }

        $this->validate($request, [
            'name'     => ['required', 'min:5', 'max:30',
                function ($attribute, $value, $fail) {
                    if (!preg_match('/^[a-zA-Z_]+/', $value)) {
//                        return $fail('用户名由字母,数字,下划线组成,且不能以数字开头');
                        return $fail('用户名 格式不正确');
                    }
                }
            ],
            'password' => 'nullable|min:6|max:30|confirmed',
        ]);

        $data         = [];
        $data['name'] = $request->name;
        if ($request->password) {
            $data['password'] = $request->password;
        }

        // 如果内容未改变,返回提示
        if ($data['name'] == $user->name && ((array_key_exists('password', $data) && $request->password == $user->password) || !array_key_exists('password', $data))) {
            session()->flash('danger', '本次个人信息未发生变化,请重新填写');
            return back();
        }

        $user->update($data);

        session()->flash('success', '更新个人信息成功');
        return redirect()->route('users.show', $user);
    }

    // 执行用户删除动作
    public function destroy(User $user)
    {
//        var_dump($user->id);
        // 自己写的条件,未使用授权系统
//        if(Auth::user()->is_admin && !($user->is_admin)){
//            $user->delete();
//            session()->flash('success','成功删除用户~');
//            return back();
//        }else{
//            session()->flash('danger','没有权限执行此操作~');
//            return back();
//        }

        // 经过授权系统
        try {
            $this->authorize('destroy', $user);
        } catch (AuthorizationException $e) {
            return abort(403, '你没有权限删除别人~');
        }

        $user->delete();
        session()->flash('success', '成功删除用户~');
        return back();
    }


}
