<?php

namespace app\admin\controller;

use think\Controller;
use think\Request;
use app\common\traits\Upload;
use app\common\model\Category as model;
use think\facade\View;
use think\facade\Cache;

class Category extends Controller
{
    use Upload;

    protected function initialize()
    {
        $top = model::top()->select();
        View::share('topcategories', $top);
    }
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        $datas = model::with('subcates')->select();
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
        $res = $this->validate($datas, 'app\admin\validate\Category');
        if($res !== true)
        {
            return json([
                'code' => 422,
                'error' => $res,
            ]);
        }

        foreach(['icon', 'bg_image'] as $v)
        {
            if(!empty($datas[$v]))
            {
                $datas[$v] = $this->upload($datas[$v]);
            }
        }

        model::create($datas);
        Cache::rm('navs');
        return json([
            'code' => 1,
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
        $datas = $request->param(true);
        $res = $this->validate($datas, 'app\admin\validate\Category');
        if($res !== true)
        {
            return json([
                'code' => 422,
                'error' => $res,
            ]);
        }
        $row = model::getOrFail($id);
        foreach(['icon', 'bg_image'] as $v)
        {
            if(!empty($datas[$v]))
            {
                $datas[$v] = $this->upload($datas[$v]);
            }
        }
        $row->save($datas);
        Cache::rm('navs');
        Cache::rm('banner');
        return json([
            'code' => 1,
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
        $cate = model::getOrFail($id);
        $cate->delete();
         Cache::rm('navs');
        return json(['status' => 1]);
    }
}
