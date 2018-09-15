@extends('layouts.default')
@section('title','首页')

@section('content')
    <div class="row">
        <div class="col-md-offset-1 col-md-9">
            @include('layouts._session_flash_messages')
            @if(!Auth::check())
                <div class="jumbotron">
                    <h1>Welcome to Sample App</h1>
                    <p>这是一个小型微博网站, 在这里, 您可以 blablabla...</p>
                    <p>blablabla...</p>
                    <p>
                        <a class="btn btn-primary" href="{{ route('users.create') }}" role="button">注册</a>
                        <a class="btn btn-primary" href="{{ route('login') }}" role="button">登陆</a>
                    </p>

                </div>
            @else
                <div class="row">
                    <div class="col-md-2 text-center">
                        @include('users._user_img',['user'=>Auth::user()])
                        {{ Auth::user()->name }}
                    </div>

                    <div class="col-md-10">
                        @include('statuses._status_form')
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        @if($feed_items->count()>0)
                            {!! $feed_items->render() !!}
                            <ul class="list-group">
                                @foreach($feed_items as $status)
                                    @include('statuses._status',['user'=>Auth::user()])
                                @endforeach
                            </ul>
                            {!! $feed_items->render() !!}
                        @endif
                    </div>


                </div>

            @endif
        </div>

    </div>

@endsection
