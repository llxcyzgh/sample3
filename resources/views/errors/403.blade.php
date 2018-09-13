@extends('layouts.default')
@section('title','403错误')
@section('content')
    <div class="jumbotron">
        <h3>403错误</h3>
        <p class="lead">
            {{--{{ $exception->getMessage()?$exception->getMessage():'禁止访问 ~ ( 原因你懂的 )' }}--}}
            {{ $exception->getMessage()?:'禁止访问 ~ ( 原因你懂的 )' }}
        </p>
        <p>
            <a href="/" class="btn  btn-primary">返回首页</a>
        </p>
    </div>
@endsection