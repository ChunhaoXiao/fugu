<?php

namespace app\admin\controller;

use think\Controller;
use think\Request;
use app\common\model\Product as model;
use app\common\model\Category;
use think\facade\View;
use app\common\traits\Upload;

class Product extends Controller
{
    protected $middleware = [
        'Auth'
    ];
    use Upload;

    protected function initialize()
    {
        $categories = Category::type('product')->with('subcates')->find();
        //dump($categories);
        View::share('categories', $categories->subcates);
    }

    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        $datas = model::with('category')->order('create_time desc')->paginate(20);
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
        $res = $this->validate($datas, 'app\admin\validate\Product');
        if($res !== true)
        {
            return json([
                'code' => 422,
                'error' => $res,
            ]);
        }
        $category = Category::getOrFail($datas['category_id']);
        if(!empty($datas['cover']))
        {
            $datas['cover'] = $this->upload($datas['cover']);
        }
        // if(!empty($datas['album']))
        // {
        //     $datas['album'] = $this->uploadAll($datas['album']);
        // }
        $category->products()->save($datas);
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
        //dump($data->album);
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
        $res = $this->validate($datas, 'app\admin\validate\Product.edit');
        if($res !== true)
        {
            return json([
                'code' => 422,
                'error' => $res,
            ]);
        }
        $row = model::getOrFail($id);
        if(!empty($datas['cover']))
        {
            $datas['cover'] = $this->upload($datas['cover']);
        }
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
        model::destroy($id);
        //return json();
    }
}
