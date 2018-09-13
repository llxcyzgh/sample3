{{-- 全体用户列表 --}}
@extends('layouts.default')
@section('title','个人信息')
@section('content')
    <div class="row">
        <div class="col-md-offset-2 col-md-8">
            @include('layouts._session_flash_messages')

            {!! $users->render() !!}
            <ul class="list-group">
                @foreach($users as $user)
                    <li class="list-group-item clearfix">
                        {{-- 引入用户头像 --}}
                        <div class="col-md-2">
                            @include('users._user_img')

                        </div>
                        <div class="col-md-6 user-name">
                            {{-- 用户名 --}}
                            {{ $user->name }}
                            {{--{{ $user->name.'--'.$user->id }} -- {{ $user->id }}--}}
                            {{--{{ $user->name }} -- {{ $user->created_at.' -- '.$user->id }}--}}
                        </div>

                        {{--如果登陆用户是管理员用户,并且当前li里面的用户不是管理员,则显示删除按钮(表单)--}}
                        {{--@if(Auth::user()->is_admin && !($user->is_admin))--}}
                        {{--<div class="col-md-2 pull-right">--}}
                        {{--<form action="{{ route('users.destroy',$user->id) }}" method="post">--}}
                        {{--{{ csrf_field() }}--}}
                        {{--{{ method_field('delete') }}--}}
                        {{--<button type="submit" class="btn btn-danger">删除</button>--}}
                        {{--</form>--}}
                        {{--</div>--}}
                        {{--@endif--}}

                        @can('destroy',$user)
                            <div class="col-md-2 pull-right">
                                <form action="{{ route('users.destroy',$user->id) }}" method="post">
                                    {{ csrf_field() }}
                                    {{ method_field('delete') }}
                                    <button type="submit" class="btn btn-danger">删除</button>
                                </form>
                            </div>
                        @endcan

                    </li>
                @endforeach
            </ul>
            {!! $users->render() !!}

        </div>
    </div>

@endsection