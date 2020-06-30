<?php
namespace app\index\controller;
use think\Controller;
use think\Request;
use app\common\service\IndexService;

class Index extends Controller
{
	protected $middleware = ['CheckConf'];

    public function index()
    {
        //echo cookie('think_var');
    	$service = new IndexService();
    	$datas = $service->getData();
    	//dump($datas['contacts']);
        return view('index', $datas);
    }

    // public function hello($name = 'ThinkPHP5')
    // {
    //     return 'hello,' . $name;
    // }
}
