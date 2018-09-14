{{-- 用户忘记密码-->重设界面 --}}

@extends('layouts.default')
@section('title','重置密码')
@section('content')
    <div class="row">
        <div class="col-md-offset-3 col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading"><h3>重置密码</h3></div>
                <div class="panel-body">

                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="{{ route('password.update') }}" method="post">
                        {{ csrf_field() }}

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="form-group">
                            <label for="email">邮箱</label>
                            <input type="email" name="email" id="email" class="form-control" value="{{ old('name') }}">
                            @if ($errors->has('email'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                            @endif
                        </div>


                        <div class="form-group">
                            <label for="password">密码</label>
                            <input type="password" name="password" id="password" class="form-control"
                                   value="{{ old('name') }}">

                            @if ($errors->has('password'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="password_confirmation">确认密码</label>
                            <input type="password" name="password_confirmation" id="password_confirmation"
                                   class="form-control" value="{{ old('name') }}">

                            @if ($errors->has('password_confirmation'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">发送密码重置邮件</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection