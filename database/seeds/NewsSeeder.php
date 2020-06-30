<?php

use think\migration\Seeder;
use app\common\model\News;
use app\common\model\Category;

class NewsSeeder extends Seeder
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeders is available here:
     * http://docs.phinx.org/en/latest/seeding.html
     */
    public function run()
    {
        $cates = Category::type('news')->with('subcates')->find();
        for($i = 0; $i < 20; $i ++)
        {
            foreach($cates->subcates as $k => $cate)
            {
                $title = $cate->name.'新闻分类测试'.'这是第'.$i.'条新闻';
                if(!News::where('title', $title)->find())
                {
                    $days = random_int(2, 20);
                    $row['title'] = $title;
                    $row['content'] = str_repeat('这是'.$cate->name.'分类的第'.$i.'条新闻的内容,', 8);
                    $row['cover'] = 'news'.($k+1).'.jpg';
                    $row['create_time'] = date('Y-m-d H:i:s', strtotime("-".$days." days"));
                    $cate->news()->save($row);
                }
            }
        }
    }
}