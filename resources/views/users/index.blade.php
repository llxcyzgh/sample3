{{-- 全体用户列表 --}}
@extends('layouts.default')
@section('title','个人信息')
@section('content')
    <div class="row">
        <div class="col-md-offset-2 col-md-8">
            <ul class="list-group">
                @foreach($users as $user)
                    <li class="list-group-item clearfix">
                        {{-- 引入用户头像 --}}
                        <div class="col-md-2">
                            @include('users._user_img')

                        </div>
                        <div class="col-md-2 user-name">
                            {{-- 用户名 --}}
                            {{ $user->name }}
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>

@endsection