<?php

namespace app\http\middleware;
use app\common\model\Config;
use think\facade\Cache;
class CheckConf
{
    public function handle($request, \Closure $next)
    {
    	//将配置写到缓存中
    	Cache::remember('config', function(){
    		$datas = Config::select()->toArray();
            $fields = config('configration.');

            foreach($datas as &$v)
            {

                $v = str_replace('\\', '/', $v);

            }
            unset($v);
    		$datas = array_column($datas, 'value', 'name');
            foreach ($fields as $key => $value) {
                $datas[$value['name']] = isset($datas[$value['name']])? $datas[$value['name']] : '';
            }
    		return $datas;
    	});

    	//导航菜单缓存
    	Cache::remember('navs', function(){
            //echo 'regenerated';
    		$datas =  \app\common\model\Category::top()->with('subcates')->select();
            return $datas;
    	});
        Cache::remember('banner', function(){
            $datas = \app\common\model\Category::top()->column('bg_image', 'type');
            $res = array_map(function($item){
                return str_replace('\\', '/', $item);
            },$datas);
            return $res;
        });

    	//轮播图缓存
    	Cache::remember('swiper', function(){
    		return \app\common\model\Swiper::order('order')->select();
    	});
        //dump(cache('navs'));
    	return $next($request);
    }
}
