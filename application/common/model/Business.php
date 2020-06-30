<?php

namespace app\common\model;

use think\Model;

class Business extends Model
{
    public function category()
    {
    	return $this->belongsTo(Category::class, 'category_id');
    }

    public function getLangConAttr($v, $data)
    {
    	$lang = cookie('think_var');
        if(!empty($lang) && $lang == 'en-us')
        {
            if(!empty($data['en_content']))
            {
                return $data['en_content'];
            }
        }
        return $data['content'];
    }

    public function getLangTitleAttr($v, $data)
    {
    	$lang = cookie('think_var');
        if(!empty($lang) && $lang == 'en-us')
        {
            if(!empty($data['en_title']))
            {
                return $data['en_title'];
            }
        }
        return $data['title'];
    }
}
