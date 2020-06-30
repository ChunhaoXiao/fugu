<?php

namespace app\admin\controller;

use think\Controller;
use think\Request;
use app\common\model\HrRule as model;
class HrRule extends Controller
{
    protected $middleware = [
        'Auth'
    ];
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        $datas = model::order('order')->select();
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
        $datas = $request->post(['content', 'en_content']);
        if($request->content)
        {
            model::create($datas);
            return json([
                'code' => 1,
            ]);
        }
        return json([
            'code' => 422,
            'error' => '内容不能为空',
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
        //
    }

    /**
     * 显示编辑资源表单页.
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function edit($id)
    {
        $data = model::get($id);
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
        $datas = $request->post();
        if($request->content)
        {
            $row = model::getOrFail($id);
            $row->save($datas, ['id' => $id]);
            return json([
                'code' => 1,
            ]);
        }
        return json([
            'code' => 422,
            'error' => '内容不能为空',
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
