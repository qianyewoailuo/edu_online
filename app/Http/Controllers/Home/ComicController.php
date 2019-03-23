<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Home\Comic;

class ComicController extends Controller
{
    // 动漫首页
    public function index(){
        $data = Comic::get();
        return view('home.comic.index',compact('data'));
    }
}
