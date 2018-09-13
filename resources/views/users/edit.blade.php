@extends('layouts.default')
@section('title','修改个人资料')
@section('content')
    <div class="row">
        <div class="col-md-offset-3 col-md-6 col-sm-offset-2 col-sm-8">
            <div class="panel panel-default">
                <div class="panel-heading"><h3>修改个人资料</h3></div>
                <div class="panel-body">
                        @include('users._user_img')

                    {{--<form action="{{ route('users.update',[$user->id]) }}" method="post">--}}
                    <form action="{{ route('users.update',[$user->id]) }}" method="post">
                        {{ csrf_field() }}
                        {{ method_field('patch') }}
                        {{-- 引入验证生成的错误信息 --}}
                        @include('layouts._errors')
                        @include('layouts._session_flash_messages')

                        {{-- for disable autocomplete on chrome --}}
                        <input type="password" style="display: none">
                        <div class="form-group">
                            <label for="name">用户名</label>
                            <input type="text" name="name" id="name" class="form-control" value="{{ $user->name }}">
                        </div>

                        <div class="form-group">
                            <label for="email">邮箱</label>
                            <input type="email" name="email" id="email" class="form-control" disabled="disabled"
                                   value="{{ $user->email }}">
                        </div>

                        <div class="form-group">
                            <label for="password">密码</label>
                            <input type="password" name="password" id="password" class="form-control"
                                   autocomplete="new-password" readonly="readonly">

                        </div>

                        <div class="form-group">
                            <label for="password_confirmation">重复密码</label>
                            <input type="password" name="password_confirmation" id="password_confirmation"
                                   class="form-control">
                        </div>

                        <button type="submit" class="btn btn-primary">修改</button>

                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(function () {
            setTimeout(function () {
                $('#password').removeAttr('readonly');
            }, 1000);
        });
    </script>
@endsection

