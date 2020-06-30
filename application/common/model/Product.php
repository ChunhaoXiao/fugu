<?php

namespace app\common\model;

use think\Model;

class Product extends Model
{
    // protected $type = [
    //     'album' => 'array',
    // ];

    public function category()
    {
    	return $this->belongsTo(Category::class, 'category_id');
    }

    public function scopeRecommend($query)
    {
    	$query->where('is_recommend', 1);
    }

    public function getPrevAttr($v, $data)
    {
    	return '';
    }

    public function getNextAttr()
    {
    	return '';
    }

    public function getSimilar()
    {
    	$datas = $this->category()->products()->where('id', '<>', $this->id)->orderRaw('rand()')->limit(5)->select();
    	return $datas;
    }

    public function getLangNameAttr($v, $data)
    {
        $lang = cookie('think_var');
        if(!empty($lang) && $lang == 'en-us')
        {
            if(!empty($data['en_name']))
            {
                return $data['en_name'];
            }
        }
        return $data['name'];
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

    public function getAlbumAttr($v, $data)
    {
        if(empty($v))
        {
            return [];
        }
        return explode(',', $v);
    }

    public function scopeSearch($query, $str)
    {
        if($str)
        {
            $query->where('name', 'like', '%'.$str.'%')->whereOr('content', 'like', '%'.$str.'%');
        }
    }
}
