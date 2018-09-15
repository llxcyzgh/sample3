<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StaticPagesController extends Controller
{
    // 显示 index 页面
	public function index(){
        if (Auth::check()) {
            $feed_items = Auth::user()->feed()->paginate(10);
        }
		return view('static_pages.index',compact('feed_items'));
	}
	
	// 显示 help 页面
	public function help(){
		return view('static_pages.help');
	}
	
	// 显示 about 页面
	public function about(){
		return view('static_pages.about');
	}

	// 显示测试tt页面
    public function tt()
    {
        return view('tt');
    }
	
	
}
