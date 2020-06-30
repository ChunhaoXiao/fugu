<?php

namespace app\common\model;

use think\Model;
use think\facade\Cache;

class Category extends Model
{

    public static function init()
    {
        self::event('after_write', function ($user) {
            Cache::rm('navs');
        });
    }
    
    public function subcates()
    {
    	return $this->hasMany(Category::class, 'parent_id')->order('order');
    }


    public function category()
    {
    	return $this->belongsTo(Category::class, 'parent_id');
    }

    public function scopeTop($query)
    {
    	$query->where('parent_id', 0)->order('order');
    }

    public function scopeAbout($query)
    {
    	$query->where('type', 'about');
    }

    public function scopeBusiness($query)
    {
        $query->where('type', 'business');
    }

    public function aboutus()
    {
    	return $this->hasOne(About::class, 'category_id');
    }

    public function businesses()
    {
        return $this->hasMany(Business::class, 'category_id');
    }

    public function products()
    {
        return $this->hasMany(Product::class, 'category_id');
    }

    public function news()
    {
        return $this->hasMany(News::class, 'category_id');
    }

    // public function lastnews()
    // {   
    //     return $this->hasOne(News::class, 'category_id')->order('create_time desc');
    // }

    public function scopeType($query, $type)
    {
        $query->where('type', $type);
    }

    public function is_current()
    {
        $data = explode('/', $this->url);
        return strtolower($data[0]) == strtolower(request()->controller());
    }

    public function getIconAttr($v, $data)
    {
        return str_replace('\\', '/', $v);
    }

    public function getLangAttr($v, $data)
    {
        $lang = cookie('think_var');
        if($lang && $lang == 'en-us' && !empty($data['en_name']))
        {
            return $data['en_name'];
        }
        return $data['name'];
    }

    public function getIsHonorAttr($v, $data)
    {
        return strpos($data['name'], '荣誉')!== false || strpos($data['name'], '资质') !== false;
    }

    public function getIsCultureAttr($v, $data)
    {
        return strpos($data['name'], '文化') !== false;
    }

    public function getIsContentAttr($v, $data)
    {
        //既不是荣誉资质 也不是企业文化
        return strpos($data['name'], '文化') === false && strpos($data['name'], '荣誉')=== false;
    }

}
