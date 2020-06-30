<?php

namespace app\admin\controller;

use think\Controller;
use think\Request;
use app\common\model\Swiper as model;
use app\common\traits\Upload;

class Swiper extends Controller
{
    protected $middleware = [
        'Auth'
    ];
    use Upload;
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        $datas = model::select();
        return view('index', ['datas' => $datas]);
    }

    /**
     * 显示创建资源表单页.
     *
     * @return \think\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * 保存新建的资源
     *
     * @param  \think\Request  $request
     * @return \think\Response
     */
    public function save(Request $request)
    {
        $datas = $request->param(true);
        $res = $this->validate($datas, 'app\admin\validate\Swiper');
        if($res !== true)
        {
            return json([
                'code' => 422,
                'error' => $res,
            ]);
        }
        $datas['path'] = $this->upload($datas['path']);
        model::create($datas);
        return json([
            'code' => 1
        ]);
    }

    /**
     * 显示指定的资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function read($id)
    {
        
    }

    /**
     * 显示编辑资源表单页.
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function edit($id)
    {
        $data = model::getOrFail($id);
        return view('create', ['data' => $data]);
    }

    /**
     * 保存更新的资源
     *
     * @param  \think\Request  $request
     * @param  int  $id
     * @return \think\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->param(true);
        $row = model::getOrFail($id);
        if(!empty($data['path']))
        {
            $data['path'] = $this->upload($data['path']);
        }
        $row->save($data);
        return json([
            'code' => 1
        ]);
    }

    /**
     * 删除指定资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function delete($id)
    {
        model::destroy($id);
        return json([
            'code' => 1
        ]);
    }
}
