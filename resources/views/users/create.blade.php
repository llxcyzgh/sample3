@extends('layouts.default')
@section('title','用户注册')
@section('content')
    <div class="row">
        <div class="col-md-offset-3 col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading"><h3>用户注册</h3></div>
                <div class="panel-body">
                    <form action="{{ route('users.store') }}" method="post">
                        {{ csrf_field() }}
                        {{-- 引入验证生成的错误信息 --}}
                        @include('layouts._errors')

                        <div class="form-group">
                            <label for="name">用户名</label>
                            <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}">
                        </div>

                        <div class="form-group">
                            <label for="email">邮箱</label>
                            <input type="email" name="email" id="email" class="form-control" value="{{ old('name') }}">
                        </div>

                        <div class="form-group">
                            <label for="password">密码</label>
                            <input type="password" name="password" id="password" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="password_confirmation">重复密码</label>
                            <input type="password" name="password_confirmation" id="password_confirmation"
                                   class="form-control">
                        </div>

                        <button type="submit" class="btn btn-primary">注册</button>

                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection