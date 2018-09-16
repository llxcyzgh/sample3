<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Yx;

class YxsController extends Controller
{
    public function index()
    {
//        return 'yxs';
//        $list_item = Yxs::all()->orderBy('created_at','desc');
//        $list_item = DB::table('yxs')->orderBy('created_at','desc')->get();
//        $list_item = Yxs::orderBy('created_at', 'desc')->get();
//        $list_item = Yx::where('name','!=','0')->orderBy('created_at','desc')->get();
        $list_item = Yx::orderBy('created_at','desc')->get();
//        var_dump($list_item[0]);
        return view('yxs.index', compact('list_item'));
    }

    public function store(Request $request)
    {
//        var_dump($request->toArray());
//        die;
        $this->validate($request, [
            'number' => 'required|integer|min:0|max:100',
        ]);

        Yx::create([
            'name'   => $request->name,
            'number' => $request->number,
        ]);

        session()->flash('success', '添加 ' . $request->name . ' 宝箱信息成功');
        return back();
    }

//    public function destroy2($item)
//    {
////        var_dump($item);exit;
//        $obj = Yxs::find($item);
//        $obj->delete();
//        session()->flash('success', '删除宝箱信息成功');
//        return back();
//    }
    public function destroy(Yx $yx)
    {
//        var_dump($yx);exit;
        $yx->delete();
        session()->flash('success', '删除宝箱信息成功');
        return back();
    }


}
