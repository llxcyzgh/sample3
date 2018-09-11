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
    <!-- Bootstrap core CSS -->
    <link href="css/app.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    {{--<link href="css/view_default.css" rel="stylesheet">--}}
</head>

<body>

<!-- Fixed navbar -->
<nav class="navbar navbar-default navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Sample App</a>
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
                <li><a href="#">登陆</a></li>
                <li><a href="#">注册</a></li>
            </ul>
        </div>
    </div>
</nav>


