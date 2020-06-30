<?php

namespace app\index\controller;

use think\Controller;
use think\Request;
use app\common\model\About as model;
use app\common\model\Category;

class About extends Controller
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        $datas = Category::type('about')->with('subcates.aboutus')->find();
        //dump($datas);
        foreach ($datas->subcates as $key => $value) {
            $subcates[$value['order']] = $value->lang;
        }
        // ksort($subcates);
        //dump($datas->subcates);
        // exit;

        // dump($datas->subcates[3]->aboutus->culture);
        // exit;
        //dump($datas);
        return view('index', [
            'datas' => $datas, 
            'title' => '关于我们',
            'subcates' => $subcates,
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
