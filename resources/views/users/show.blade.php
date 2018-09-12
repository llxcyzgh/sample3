@extends('layouts.default')
@section('title','个人信息')
@section('content')
    <div class="row">
        <div class="col-md-offset-2 col-md-8">
            <div class="text-center">
                {{-- 引入闪存信息(成功) --}}
                @include('layouts._session_flash_messages')

                {{-- 引入用户头像 --}}
                @include('users._user_img')

                {{-- 用户名 --}}
                <div>
                    {{ $user->name }}
                </div>
            </div>

        </div>
    </div>

@endsection