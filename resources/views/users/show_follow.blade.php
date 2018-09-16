@extends('layouts.default')
@section('title',$title)

@section('content')
    <div class="col-md-offset-2 col-md-8">
        {!! $users->render() !!}
        <ul class="list-group">
            @foreach($users as $user)
                <li class="list-group-item clearfix">
                    <a href="{{ route('users.show',$user->id) }}">
                        <div class="col-md-2">
                            @include('users._user_img')
                        </div>
                        <div class="col-md-5" style="padding-top: 30px">

                            {{ $user->name }}
                        </div>
                    </a>
                    @if($title=='关注的人' && $current_user->id == Auth::user()->id)
                        <div class="col-md-2">
                            <form action="{{ route('followers.destroy',$user->id) }}" method="post">
                                {{ csrf_field() }}
                                {{ method_field('delete') }}
                                <button type="submit" class="btn btn-danger btn-sm">删除我关注的人</button>
                            </form>

                        </div>
                    @endif
                </li>
            @endforeach
        </ul>
        {!! $users->render() !!}

    </div>

@endsection