@extends('layouts.default')
@section('title','个人信息')
@section('content')
    <div class="row">
        <div class="col-md-offset-2 col-md-6">
            <div class="text-center">
                {{-- 引入闪存信息(成功) --}}
                @include('layouts._session_flash_messages')

                {{-- 引入用户头像 --}}
                @include('users._user_img')

                {{-- 用户名 --}}
                <div>
                    {{ $user->name }}
                </div>
                @if(Auth::user()->id != $user->id)
                    @if(Auth::user()->isFollowing($user->id))
                        <div>
                            <form action="{{ route('followers.destroy',$user->id) }}" method="post">
                                {{ csrf_field() }}
                                {{ method_field('delete') }}
                                <button type="submit" class="btn btn-danger btn-sm">取消关注</button>
                            </form>
                        </div>
                    @else
                        <div>
                            <form action="{{ route('followers.store',$user->id) }}" method="post">
                                {{ csrf_field() }}
                                <button type="submit" class="btn btn-success btn-sm">关注</button>
                            </form>
                        </div>
                    @endif
                @endif

            </div>
        </div>

        <div class="col-md-4">
            <div class="list-group">
                <span class="list-group-item">关注人数 -- {{ $user->followings()->count() }}</span>
                <span class="list-group-item">粉丝人数 -- {{ $user->followers->count() }}</span>
                <span class="list-group-item">微博总数 -- {{ $user->statuses->count() }}</span>
            </div>

        </div>

    </div>

    {{-- 个人微博部分 --}}
    @if($feed_items->count()>0)
        <div class="row">
            <div class="col-md-offset-2 col-md-8">
                {!! $feed_items->render() !!}
                <ul class="list-group">
                    @foreach($feed_items as $status)
                        @include('statuses._status',['user'=>$status->user])
                    @endforeach
                </ul>
                {!! $feed_items->render() !!}
            </div>
        </div>
    @endif

@endsection