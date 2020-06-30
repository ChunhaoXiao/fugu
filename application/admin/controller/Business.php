<?php

namespace app\admin\controller;

use think\Controller;
use think\Request;
use app\common\model\Category;
use think\facade\View;
use app\common\model\Business as model;

class Business extends Controller
{

    protected $middleware = [
        'Auth'
    ];
    protected function initialize()
    {
        $categories = Category::business()->with('subcates')->find();
        View::share('categories', $categories->subcates);
    }
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        $datas = model::with('category')->limit(30)->select();
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
        $datas = $request->post();
        $res = $this->validate($datas, 'app\admin\validate\Business');
        if($res !== true)
        {
            return json([
                'code' => 422,
                'error' => $res,
            ]);
        }
        $category = Category::getOrFail($datas['category_id']);
        $category->businesses()->save($datas);
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
        $datas = $request->post();
        $res = $this->validate($datas, 'app\admin\validate\Business');
        if($res !== true)
        {
            return json([
                'code' => 422,
                'error' => $res,
            ]);
        }
        $row = model::getOrFail($id);
        $row->save($datas);
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
        //
    }
}
