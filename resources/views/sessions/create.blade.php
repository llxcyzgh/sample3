{{-- 用户登陆界面 --}}

@extends('layouts.default')
@section('title','登陆')
@section('content')
    <div class="row">
        <div class="col-md-offset-3 col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading"><h3>用户登陆</h3></div>
                <div class="panel-body">

                    <form action="{{ route('login') }}" method="post">
                        {{ csrf_field() }}
                        {{-- 引入验证生成的错误信息 --}}
                        @include('layouts._errors')

                        {{-- 引入登陆失败返回的 msg 信息 --}}
                        @include('layouts._session_flash_messages')

                        <div class="form-group">
                            <label for="email">邮箱</label>
                            <input type="email" name="email" id="email" class="form-control" value="{{ old('name') }}">
                        </div>

                        <div class="form-group">
                            <label for="password">密码</label>
                            <small><a href="#">忘记密码?</a></small>
                            <input type="password" name="password" id="password" class="form-control">
                        </div>

                        <div class="checkbox">
                            <label><input type="checkbox" name="remember_me" value="true"> 记住我</label>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">登陆</button>
                        </div>

                        <div class="form-group">
                            <p>还没账号? <a href="{{ route('users.create') }}">现在注册</a></p>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection