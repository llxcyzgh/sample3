{{--显示单条微博局部视图--}}

<li class="list-group-item clearfix">
    <div class="col-md-2 text-center">
        @include('users._user_img')
        <div>
            {{ $user->name }}
        </div>
    </div>
    <div class="col-md-8">
        {{--{{ $status }}--}}
        {{ $status->content }}
        {{--{{ $status->created_at}}--}}
        <br>
        <span class="pull-right text-info">
           {{ $status->created_at->diffForHumans() }}
        </span>
    </div>

    {{--@if(Auth::user()->id == $status->user->id)--}}
{{--    @if(Auth::user()->id == $status->user_id)
        <div class="col-md-1">
            <form action="#" method="post">
                {{ csrf_field() }}
                {{ method_field('delete') }}
                <button type="submit" class="btn btn-sm btn-danger">删除</button>
            </form>
        </div>
    @endif--}}

    @can('destroy',$status)
        <div class="col-md-1">
            <form action="{{ route('statuses.destroy',$status) }}" method="post">
                {{ csrf_field() }}
                {{ method_field('delete') }}
                <button type="submit" class="btn btn-sm btn-danger">删除</button>
            </form>
        </div>
    @endcan
</li>
