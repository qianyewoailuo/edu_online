<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class UploadController extends Controller
{
    //后台头像上传的方法
    public function webuploader(Request $request){
        if($request->hasFile('file') && $request->file('file')->isValid()){
            $filename = sha1(time().$request->file('file')->getClientOriginalName()).'.'.$request->file('file')->getClientOriginalExtension();
            // 使用storage门面进行文件保存于移动 | 之前使用的是上传方法remove()
            Storage::disk('public')->put($filename,file_get_contents($request->file('file')->path()));
            // 文件上传成功返回提示信息
            $result = [
                'errCode'   =>      '0',
                'errMsg'    =>      '',
                'succMsg'   =>      '文件上传成功',
                'path'      =>      '/storage/'.$filename,
            ];
        }else{
            // 文件上传出错返回提示信息
            $result = [
                'errCode'   =>     '000001',
                'errMsg'    =>      $request->file('file')->getErrorMessage(),
            ];
        }
        return $result;
    }
}
