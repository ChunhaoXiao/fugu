<?php

namespace app\admin\controller;

use think\Controller;
use think\Request;
//use app\common\traits\Upload;

class FileUpload extends Controller
{
     protected $middleware = [
        'Auth'
    ];
    //use Upload;
    public function upfile(Request $request, $rule = [])
    {
        $file = $request->file('file');
        $rule = $rule?? ['size' => 8000000, 'ext' => 'jpg,jpeg,png.mp4,flv,avi,rmvb'];
        $info = $file->validate($rule)->move('./uploads');
        if(!$info)
        {
            return json([
                'code' => 1,
                'message' => $file->getError(),
            ]);
        }
        return json([
                'code' => 0,
                'data' => [
                    'src' => 'http://'.$request->host().'/uploads/'.$info->getSaveName(),
                    'save_name' => $info->getSaveName(),
                ]
        ]);
    }
}
