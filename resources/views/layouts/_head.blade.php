<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="zhu">
    <link rel="icon" href="https://a.photo/images/2018/09/11/favicon-jquery_.th.png">
    <title>sample - @yield('title','Sample App')</title>
    <script src="/js/app.js"></script>

    <!-- Bootstrap core CSS -->
    <link href="/css/app.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    {{--<link href="css/view_default.css" rel="stylesheet">--}}

</head>

<body>

<!-- Fixed navbar -->
<nav class="navbar navbar-default navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                    aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ route('home') }}">Sample App</a>
        </div>
        <div id="navbar" class=" navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li><a href="{{ route('home') }}">首页</a></li>
                <li><a href="{{ route('about') }}">关于</a></li>
                <li><a href="{{ route('help') }}">帮助</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                       aria-expanded="false">项目案例 <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li class="dropdown-header">静态页面</li>
                        <li><a href="#">简历</a></li>
                        <li><a href="#">仿中兴首页</a></li>
                        <li role="separator" class="divider"></li>
                        <li class="dropdown-header">动态网站</li>
                        <li><a href="#">Sample App</a></li>
                    </ul>
                </li>
            </ul>

            <ul class="nav navbar-nav navbar-right">
                @if(Auth::check())
                    {{--用户登陆时--}}
                    <li><a href="{{ route('users.index') }}">用户列表</a></li>
                    <li>
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">{{ Auth::user()->name }}</a>
                        <ul class="dropdown-menu">
                            <li><a href="{{ route('users.show',Auth::user()) }}">个人资料</a></li>
                            <li><a href="{{ route('users.edit',[Auth::user()]) }}">编辑资料</a></li>
                            <li class="divider"></li>
                            <li>
                                {{--<form action="{{ route('logout',[Auth::user()->id]) }}" method="post">--}}
                                <form action="{{ route('logout') }}" method="post">
                                    {{ csrf_field() }}
                                    {{ method_field('delete') }}
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-block btn-danger">退出</button>
                                    </div>
                                </form>
                                {{--<a href="" class="btn btn-danger">退出</a>--}}
                            </li>
                        </ul>
                    </li>
                @else
                    {{--用户未登陆时--}}
                    <li><a href="{{ route('login') }}">登陆</a></li>
                    <li><a href="{{ route('users.create') }}">注册</a></li>
                @endif
            </ul>
        </div>
    </div>
</nav>



