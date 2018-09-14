{{-- 用户忘记密码-->重设界面 --}}

@extends('layouts.default')
@section('title','忘记密码')
@section('content')
    <div class="row">
        <div class="col-md-offset-3 col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading"><h3>忘记密码账号的注册邮箱</h3></div>
                <div class="panel-body">

                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="{{ route('password.email') }}" method="post">
                        {{ csrf_field() }}
                        {{-- 引入验证生成的错误信息 --}}
                        @include('layouts._errors')

                        {{-- 引入登陆失败返回的 msg 信息 --}}
                        @include('layouts._session_flash_messages')

                        <div class="form-group">
                            <label for="email">邮箱</label>
                            <input type="email" name="email" id="email" class="form-control" value="{{ old('name') }}">
                        </div>

                        @if ($errors->has('email'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                        @endif

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">发送密码重置邮件</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection