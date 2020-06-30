<?php

namespace app\common\model;

use think\Model;

class Contact extends Model
{
    public function getNameLangAttr($v, $data) 
    {
    	$lang = cookie('think_var');
    	if($lang && $lang == 'en-us' && !empty($data['en_name']))
    	{
    		return $data['en_name'];
    	}
    	return $data['name'];
    }

    public function getAddressLangAttr($v, $data)
    {
    	$lang = cookie('think_var');
    	if($lang && $lang == 'en-us' && !empty($data['en_address']))
    	{
    		return $data['en_address'];
    	}
    	return $data['address'];
    }
}
