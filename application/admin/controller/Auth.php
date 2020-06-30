<?php

namespace app\admin\controller;

use think\Controller;
use think\Request;
use app\common\model\Admin;
use think\facade\Session;
use app\common\traits\Upload;

class Auth extends Controller
{
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
        return view('login');
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
        $user = Admin::where('username', $datas['username'])->find();
        //验证用户名和密码是否正确
        if(!$user || !$user->checkPassword($datas['password']))
        {
            $this->write();
            return redirect('auth/create')->with('error', '用户名或密码错误');
        }

        //如果通过验证 设置seesion
        Session::set('admin_id', $user->id, 'admin');
        Session::set('admin_name', $user->username, 'admin');
        //更新管理员最后登录信息
        $user->updateLoginInfo();
        return redirect('index/index');
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
    public function delete(Request $request)
    {
        //管理员注销登录
        if($request->post('action') == 'logout')
        {
            Session::delete('admin_id', 'admin');
            Session::delete('admin_name', 'admin');
            return redirect('index/index');
        } 
    }
}
