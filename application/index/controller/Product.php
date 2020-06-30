<?php

namespace app\index\controller;

use think\Controller;
use think\Request;
use app\common\model\Category;
use app\common\model\Product as model;
use think\facade\View;

class Product extends Controller
{
    protected function initialize()
    {
        $cates = Category::type('product')->with('subcates')->find();
        View::share('cates', $cates->subcates);
        View::share('catearr', $cates->subcates->column('name', 'id'));
        if(request()->category_id)
        {
            View::share('category', Category::find(request()->category_id));
        }
    } 
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index(Request $request)
    {
        $category_id = $request->category_id??'';
        $datas = model::when($category_id, function($query) use($category_id){
            $query->where('category_id', $category_id);
        })->order('id desc')->paginate(16);
        return view('index', [
            'datas' => $datas,
            'title' => '产品中心',
        ]);
    }

    /**
     * 显示创建资源表单页.
     *
     * @return \think\Response
     */
    public function create()
    {
        //
    }

    /**
     * 保存新建的资源
     *
     * @param  \think\Request  $request
     * @return \think\Response
     */
    public function save(Request $request)
    {
        //
    }

    /**
     * 显示指定的资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function read($id)
    {
        $data = model::getOrFail($id);
        $category = Category::type('product')->with('subcates')->find();
        //dump($data->album);
        return view('test', [
            'data' => $data, 
            'title' => $data->name,
            'cates' => $category->subcates,
        ]);
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
