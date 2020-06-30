<?php

namespace app\admin\controller;

use think\Controller;
use think\Request;
use app\common\traits\Upload;
use app\common\model\Config as model;
use think\facade\Cache;

class Config extends Controller
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
        //
    }

    /**
     * 显示创建资源表单页.
     *
     * @return \think\Response
     */
    public function create()
    {
        $datas = model::select()->toArray();
        $datas = array_column($datas, 'value', 'name');
        
        return view('create', ['data' => $datas]);
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
        $fields = config('configration.');
        foreach($fields as $v)
        {
            if($v['type'] == 'file')
            {
                if(!empty($datas[$v['name']]))
                {
                    $datas[$v['name']] = $this->upload($datas[$v['name']]);
                }
            }
        }
        
        foreach($datas as $k => $v)
        {
            if(!model::where('name', $k)->find())
            {
                model::create([
                    'name' => $k,
                    'value' => $v,
                ]);
            }
            else
            {
                model::where('name', $k)->update(['value' => $v]);
            }
        }
        Cache::rm('config');
        return redirect('config/create')->with('success', 1);
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
        //
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
        //
    }

    /**
     * 删除指定资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function delete($id)
    {
        //
    }
}
