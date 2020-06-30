<?php 
namespace app\common\service;
use think\Db;
class IndexService
{
	public function getData()
	{
		$datas['about'] = $this->category->type('about')->with(['subcates.aboutus'])->find();
		foreach($datas['about']->subcates as $v)
		{
			if($v->name == '公司介绍')
			{
				$datas['intro'] = $v;
				break;
			}
		}
		$datas['business'] = $this->category::type('business')->with('subcates')->find()->subcates;
		$datas['products'] = $this->product->recommend()->limit(5)->select();
		$news_cates = $this->category->type('news')->with('subcates')->find();
		$datas['video'] = $this->category->where('name', '企业视频')->with('aboutus')->find();
		$datas['contacts'] = $this->contact->find();
		//dump($datas['video']);
		foreach($news_cates->subcates as $cate)
		{
			$datas['news'][] = $cate->news()->with('category')->order('create_time desc')->find();
		}

		//dump($datas['business']);
		
		return $datas;
	}

	public function __get($name)
	{
		$class = '\app\\common\\model\\'.ucfirst($name);
		return  new $class;
	}
}