<?php

namespace app\index\validate;

use think\Validate;

class Message extends Validate
{
    /**
     * 定义验证规则
     * 格式：'字段名'	=>	['规则1','规则2'...]
     *
     * @var array
     */	
	protected $rule = [
        'name' => 'require|max:10',
        'message' => 'require|max:1000',
        'phone' => 'require|mobile',
        'email' => 'email',
    ];
    
    /**
     * 定义错误信息
     * 格式：'字段名.规则名'	=>	'错误信息'
     *
     * @var array
     */	
    protected $message = [];

    public function checkContact($v, $data)
    {

    }
}
