<?php

use think\migration\Seeder;
use app\common\model\Admin;
class AdminSeeder extends Seeder
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
        $user = [
            'username' => 'admin',
            'password' => 'admin',
        ];
        if(!Admin::where('username', $user['username'])->find())
        {
            Admin::create($user);
        }
    }
}