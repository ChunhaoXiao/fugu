<?php

use think\migration\Seeder;
use app\common\model\HrRule;
class HrSeeder extends Seeder
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
                'content' => '一总则：以德取才，以能用才，以需育才，以信留才',
                'order' => 0,
            ],
            [
                'content' => '二基点：既要用人之力，更要用人之智',
                'order' => 1,
            ],
            [
                'content' => '三部曲：信任、约束、成长',
                'order' => 2,
            ]
        ];
        foreach($datas as $v)
        {
            HrRule::create($v);
        }
    }
}