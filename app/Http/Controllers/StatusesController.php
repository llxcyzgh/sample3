<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Status;
use Illuminate\Support\Facades\Auth;

class StatusesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'content' => 'required|min:10|max:140',
        ]);

        Auth::user()->statuses()->create([
//            'content' => $request->content,// 报错
//            'content'=>$request['content'],// 教程用,不理解,文档中没找到出处
            'content'=>$request->input('content'),// 推荐

        ]);

        return back();
    }

    public function destroy(Status $status)
    {
        $this->authorize('destroy',$status);
        $status->delete();
        session()->flash('success','删除微博成功~');
        return back();
    }


}
