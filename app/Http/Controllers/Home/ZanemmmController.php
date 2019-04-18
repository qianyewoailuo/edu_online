<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Zane\Utils\Ary;

// zanemmm/utils 类库测试控制器
class ZanemmmController extends Controller
{
    // 测试zanemmm/utils 类库的方法
    public function test()
    {
        $data = ['red','green','blue','yellow','red','red'];
        // 
        $rs = Ary::new($data)->countValues()->maxKey();
        dd($rs);
    }

}
