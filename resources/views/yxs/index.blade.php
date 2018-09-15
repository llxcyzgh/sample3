<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="/css/app.css">
    {{--<style>--}}
    {{--/*div.form-group {*/--}}
    {{--/*margin-right: 20px;*/--}}
    {{--/*}*/--}}
    {{--</style>--}}
</head>
<body>
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header text-info">
            <h3>拈花惹草 战队宝箱</h3>
        </div>
    </div>

</nav>

<div class="container">
    <div class="col-md-offset-1 col-md-10">
        @foreach(['success','danger','info','warning'] as $v)
            @if(session()->has($v))
                <div class="alert alert-{{$v}}">
                    {{ session()->get($v) }}
                </div>
            @endif
        @endforeach
    </div>

    <div class="col-md-offset-1 col-md-10">
        @if(count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>

    {{-- 添加信息表单 --}}
    <div class="col-md-offset-1 col-md-10">
        <form action="{{ route('yxs.store') }}" method="post" role="form" class="form-inline">
            {{ csrf_field() }}

            <div class="form-group">
                <label for="name">宝箱名称: </label>
                {{--<input type="text" name="name" id="name" class="form-control">--}}
                {{--<select name="name" id="name" class="form-control">--}}
                {{--<option value="buji">不羁的风</option>--}}
                {{--<option value="fengji">风继续吹</option>--}}
                {{--<option value="lala">拉拉姐</option>--}}
                {{--<option value="miaomiao">秒秒吧</option>--}}
                {{--<option value="miaomiao2">秒秒吧2</option>--}}
                {{--<option value="zaixiu">再修百年</option>--}}
                {{--<option value="luoli">萝莉控</option>--}}
                {{--<option value="youth">Youth</option>--}}
                {{--<option value="empress">Empress</option>--}}
                {{--<option value="jizhi">极致</option>--}}
                {{--<option value="tiankong">天空之城</option>--}}
                {{--<option value="a8696">a869628188...</option>--}}
                {{--<option value="youwei">有为青年</option>--}}
                {{--<option value="suyu">属于你的外...</option>--}}
                {{--<option value="jianghan">江涵。</option>--}}
                {{--<option value="dahui">大灰狼。</option>--}}
                {{--<option value="sic">( Sic )</option>--}}
                {{--<option value="changjiang">长江</option>--}}
                {{--<option value="sunlei">孙磊soul</option>--}}
                {{--<option value="xin">鑫</option>--}}
                {{--</select>--}}
                <select name="name" id="name" class="form-control">
                    <option value="不羁的风">不羁的风</option>
                    <option value="风继续吹">风继续吹</option>
                    <option value="拉拉姐">拉拉姐</option>
                    <option value="秒秒吧">秒秒吧</option>
                    <option value="秒秒吧2">秒秒吧2</option>
                    <option value="再修百年">再修百年</option>
                    <option value="萝莉控">萝莉控</option>
                    <option value="Youth">Youth</option>
                    <option value="Empress">Empress</option>
                    <option value="极致">极致</option>
                    <option value="天空之城">天空之城</option>
                    <option value="a869628188">a869628188...</option>
                    <option value="有为青年">有为青年</option>
                    <option value="属于你的外">属于你的外...</option>
                    <option value="江涵">江涵。</option>
                    <option value="大灰狼">大灰狼。</option>
                    <option value="( Sic )">( Sic )</option>
                    <option value="长江">长江</option>
                    <option value="孙磊soul">孙磊soul</option>
                    <option value="鑫">鑫</option>
                </select>

            </div>

            <div class="form-group">
                <label for="number">碎片数量: </label>
                <input type="number" name="number" id="number" class="form-control" style="width: 50%">
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">添加当前宝箱信息</button>
            </div>

        </form>
    </div>

    {{--显示列表信息--}}
    {{--@if($list_item->count()>0)--}}
    {{--<div class="col-md-offset-1 col-md-10">--}}
    {{--<ul class="list-group">--}}
    {{--@foreach($list_item as $item)--}}
    {{--<li class="list-group-item">{{ $item->name }} -- {{ $item->number }} -- {{ $item->created_at }}</li>--}}
    {{--@endforeach--}}
    {{--</ul>--}}
    {{--</div>--}}
    {{--@endif--}}

    @if($list_item->count()>0)
        <div class="col-md-offset-1 col-md-10" style="margin-top: 30px;">
            <table class="table table-striped">
                <tr>
                    <th>宝箱名称</th>
                    <th>碎片数目</th>
                    <th>时间</th>
                    <th>操作</th>
                </tr>
                @foreach($list_item as $item)
                    <tr>
                        {{--<td>{{ $item->id }}</td>--}}
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->number }}</td>
                        <td>{{ $item->created_at }}</td>
                        {{--<td>{{ $item->created_at->diffFoHumans() }}</td>--}}
                        <td>
                            <form action="{{ route('yxs.destroy',$item->id) }}" method="post">
                                {{ csrf_field() }}
                                {{ method_field('delete') }}
                                <button type="submit" class="btn btn-sm btn-danger">删除</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    @endif

</div>


</body>
</html>