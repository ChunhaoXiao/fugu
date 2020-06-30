<?php

use think\migration\Seeder;
use app\common\model\Swiper;

class SwiperSeeder extends Seeder
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
        $datas = [
            [
                'path' => 'test/banner_index.jpg',
                'order' => 0,
            ],
            [
                'path' => 'test/banner_index.jpg',
                'order' => 1,
            ],
            [
                'path' => 'test/banner_index.jpg',
                'order' => 2,
            ],
        ];
        foreach($datas as $v)
        {
            Swiper::create($v);
        }
    }
}