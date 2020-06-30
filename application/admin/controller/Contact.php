<?php

namespace app\admin\controller;

use think\Controller;
use think\Request;
use app\common\traits\Upload;
use app\common\model\Contact as model;

class Contact extends Controller
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
        $data = model::find();
        return view('create', ['data' => $data]);
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
        if(!empty($datas['code_picture']))
        {
            $datas['code_picture'] = $this->upload($datas['code_picture']);
        }
        $contact = model::find();
        if(!$contact)
        {
            model::create($datas);
            return redirect('contact/create')->with('success', 1);
        }
        $contact->save($datas);
        return redirect('contact/create')->with('success', 1);
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
