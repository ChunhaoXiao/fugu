<?php

use think\migration\Seeder;
use app\common\model\Config;

class ConfigSeeder extends Seeder
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
        $fields = config('configration.');
        foreach($fields as $v)
        {
            $row['name'] = $v['name'];
            if(!Config::where('name', $v['name'])->find())
            {
                if($v['name'] == 'index_about_bgimg')
                {
                    $row['value'] = 'test/Indexgybg.jpg';
                }
                elseif ($v['name'] == 'index_product_bgimg') {
                    $row['value'] = 'test/Chanpter.jpg';
                }
                Config::create($row);
            }
        }
    }
}