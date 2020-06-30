<?php

namespace app\admin\validate;

use think\Validate;

class News extends Validate
{
    /**
     * 定义验证规则
     * 格式：'字段名'	=>	['规则1','规则2'...]
     *
     * @var array
     */	
	protected $rule = [
        'title' => 'require',
        'content' => 'require',
        'category_id' => 'require',
        'cover' => 'fileExt:jpg,jpeg,png',
    ];
    
    /**
     * 定义错误信息
     * 格式：'字段名.规则名'	=>	'错误信息'
     *
     * @var array
     */	
    protected $message = [];
}
