<?php

namespace app\common\model;

use think\Model;
use think\facade\Session;

class Admin extends Model
{
    public function setPasswordAttr($v)
    {
    	return password_hash($v, PASSWORD_DEFAULT);
    }

    public function checkPassword($v)
    {
    	return password_verify($v, $this->password);
    }

    public function logout()
    {
    	Session::delete('admin_id',  'admin');
    	Session::delete('admin_name', 'admin');
    }

    public function updateLoginInfo()
    {
        $this->last_login_ip = request()->ip();
        $this->last_login_time = date('Y-m-d H:i:s');
        $this->save();
    }
}
