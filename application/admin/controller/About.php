<?php

namespace app\admin\controller;

use think\Controller;
use think\Request;
use think\facade\View;
use app\common\model\Category;
use app\common\model\About as model;

class About extends Controller
{
    protected $middleware = [
        'Auth'
    ];

    protected function initialize()
    {
        $categories = Category::about()->with('subcates')->find();
        View::share('categories', $categories->subcates);
    }

    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        $datas = Category::type('about')->with('subcates.aboutus')->find();

        return view('index', ['datas' => $datas->subcates]);
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
        $data = $request->post();
        
        $result = $this->validate($data, 'app\admin\validate\About');
        if($result !== true)
        {
            return json([
                'code' => 422,
                'error' => $result,
            ]);
        }
        $category = Category::getOrFail($request->category_id);
        $about = $category->aboutus;
        
        if(!$about)
        {
            $category->aboutus()->save($data);
            return json(['code' => 1]);
        }
        $category->aboutus->save($data);
        return json(['code' => 1]);
    }

    /**
     * 显示指定的资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function read()
    {
        //dump('asdfsdfdsf');
        // $category = Category::get(4);
        // $d = $category->aboutus;
        // dump($d);
    }

    /**
     * 显示编辑资源表单页.
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function edit($id)
    {
        $data = Category::getOrFail($id);
        //sdump($data->aboutus->culture);
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
        $row = model::getOrFail($id);
        $row->save(['content' => $request->content]);
        return json(['code' => 1]);
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
