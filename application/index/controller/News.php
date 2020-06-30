<?php

namespace app\index\controller;

use think\Controller;
use think\Request;
use app\common\model\Category;
use app\common\model\News as model;
use think\facade\View;

class News extends Controller
{
    private $category;

    protected function initialize()
    {
        $cates = Category::type('news')->with('subcates')->find();
        View::share('cates', $cates->subcates);

        $category = empty(request()->category_id) ? $cates->subcates[0] : Category::find(request()->category_id);

        $this->category = $category;
        View::share('category', $category);
    }
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index(Request $request)
    {
        //$category = Category::get($this->category_id);
        $datas = $this->category->news()->order('create_time desc')->paginate(10);
        return view('index', [
            //'cates' => $cates->subcates, 
            'datas' => $datas,
            //'category_id' => $category_id,
            'title' => '新闻中心',
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
        $data->updateViewCount();
        return view('read', ['data' => $data, 'title' => $data->title]);
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
