<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StaticPagesController extends Controller
{
    // 显示 index 页面
	public function index(){
		return view('static_pages.index');
	}
	
	// 显示 help 页面
	public function help(){
		return view('static_pages.help');
	}
	
	// 显示 about 页面
	public function about(){
		return view('static_pages.about');
	}
	
	
}
