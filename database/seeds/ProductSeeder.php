<?php

use think\migration\Seeder;
use app\common\model\Product;
use app\common\model\Category;

class ProductSeeder extends Seeder
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

        $cates = Category::type('Product')->with('subcates')->find();
        for($i = 0; $i < 50; $i ++)
        {
            foreach($cates->subcates as $k => $cate)
            {
                $name = $cate->name.':测试产品'.$i;
                if(!Product::where('name', $name)->find())
                {
                    $row['name'] = $name;
                    $row['cover'] = ($k+1).'.jpg';
                    $row['content'] = '这是测试'.$cate->name.':产品'.$i;
                    $row['is_recommend'] = array_rand([0, 1]);
                    $cate->products()->save($row);
                }
                
            }
        }

        // foreach($cates->subcates as $k => $v)
        // {
        //     $datas = [];
        //     for($i = 0; $i < 50; $i ++)
        //     {
        //         $row['name'] = $v->name.':测试产品'.$i;
        //         $row['cover'] = ($k+1).'.jpg';
        //         $row['content'] = '这是测试'.$v->name.':产品'.$i;
        //         $row['is_recommend'] = array_rand([0, 1]);
        //         $datas[] = $row;
        //     }
        //     $v->products()->saveAll($datas);
        // }
    }
}