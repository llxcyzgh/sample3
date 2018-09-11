@extends('layouts.default')
@section('title','首页')

@section('content')
    <div class="row">
        <div class="col-md-offset-1 col-md-9">
            <div class="jumbotron">
                <h1>Welcome to Sample App</h1>
                <p>这是一个小型微博网站, 在这里, 您可以 blablabla...</p>
                <p>blablabla...</p>
                <p>
                    <a class="btn btn-primary" href="{{ route('signup') }}" role="button">注册</a>
                    <a class="btn btn-primary" href="#" role="button">登陆</a>
                </p>
            </div>
        </div>

    </div>

@endsection
