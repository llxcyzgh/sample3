@extends('layouts.default')
@section('title','用户注册')
@section('content')
    <div class="row">
        <div class="col-md-offset-2 col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading"><h3>用户注册</h3></div>
                <div class="panel-body">
                    <form action="#" method="post">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="name">用户名</label>
                            <input type="text" name="name" id="name" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="email">邮箱</label>
                            <input type="email" name="email" id="email" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="password">密码</label>
                            <input type="password" name="password" id="password" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="password2">重复密码</label>
                            <input type="password" name="password2" id="password2" class="form-control">
                        </div>

                        <button type="submit" class="btn btn-primary">注册</button>

                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection