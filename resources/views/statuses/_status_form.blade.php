{{--创建单条微博表单 局部视图--}}

<form action="{{ route('statuses.store') }}" method="post">
    {{--引入表单数据验证错误消息--}}
    @include('layouts._errors')

    {{ csrf_field() }}

    <div class="form-group">
            <textarea name="content" id="" cols="30" rows="3" placeholder="说点什么吧~" class="form-control"
                      style="resize: none">
        {{ old('content') }}
    </textarea>
    </div>


    <div class="form-group">
        <button type="submit" class="btn btn-primary">发布</button>
    </div>


</form>