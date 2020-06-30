<?php

namespace app\common\model;

use think\Model;
use think\facade\Session;

class News extends Model
{
    public function category()
    {
    	return $this->belongsTo(Category::class, 'category_id');
    }

    public function scopeLatest($query)
    {
    	$query->order('category_id')->order('create_time desc');
    }

    public function getPrevAttr($v, $data)
    {
    	return self::where('id', '<', $data['id'])->order('id desc')->find();
    }

    public function getNextAttr($v, $data)
    {
    	return self::where('id', '>', $data['id'])->order('id')->find();
    }

    public function scopeSearch($query, $str)
    {
        if($str)
        {
            $query->where('title', 'like', '%'.$str.'%')->whereOr('content', 'like', '%'.$str.'%');
        }

    }

    public function updateViewCount()
    {
        $key = $this->id;
        if(empty(Session::get($key)))
        {
            $this->view_count = $this->view_count + 1;
            $this->save();
            Session::set($key, 1);
        }
    }

    public function getLangConAttr($v, $data)
    {
        $lang = cookie('think_var');
        if(empty($lang) || $lang == 'en-us')
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
        if(empty($lang) || $lang == 'en-us')
        {
            if(!empty($data['en_title']))
            {
                return $data['en_title'];
            }
        }
        return $data['title'];
    }
}
