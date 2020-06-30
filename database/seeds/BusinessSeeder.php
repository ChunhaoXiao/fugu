<?php

use think\migration\Seeder;
use app\common\model\Category;

class BusinessSeeder extends Seeder
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
        $category = Category::type('business')->with('subcates')->find();
        foreach($category->subcates as $v)
        {
            $v->businesses()->save([
                'title' => '测试',
                'content' => '测试！！！！！！！！！！！',
            ]);
        }
    }   
}