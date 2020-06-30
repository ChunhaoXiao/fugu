<?php

use think\migration\Seeder;
use app\common\model\Language;

class LanguageSeeder extends Seeder
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
        $keys = [
            'sitename' => '大连富谷集团',
            'index' => '首页',
            // 'about' => '关于我们',
            // 'business' => '主要产业',
            // 'product' => '产品中心',
            // 'news' => '新闻中心',
            // 'hr' => '人力资源',
            'join' => '招商加盟',
            'contact' => '联系我们',
            // 'read_more' => '查看更多',
            // 'read_detail' => '查看详情', 
            'about' => '关于富谷',
            'business' => '主要产业',
            'product' => '产品中心',
            'news' => '新闻中心',
            'readmore' => '查看更多',
            'detail' => '查看详情',
            'introduction' => '公司介绍',
            'your_name' => '您的姓名',
            'phone' => '电话',
            'email' => '常用邮箱',
            'wechat' => '常用微信',
            'message' => '留言内容',
            'address' => '地址',
            'fax' => '传真',
            'post_code' => '邮编',
            'website' => '官网',
            'scan_code' => '扫码关注<br/>企业公众号',
            'all_product' => '全部产品',
            'hr_idea' => '人才理念',
            'recruit' => '招贤纳士',
            'submit' => '提交',
            'human_resource' => '人力资源',

            'company_name' => '公司名',

            'outline' => '文化纲要',

            'hr_philosophy' => '公司人力资源管理理念',

            'salary' => '薪资',
            'join_text' => '诚招全国各省市有实力代理商',
            'job_location' => '工作地点',
            'job_requirement' => '相关要求',
            'job_quantity' => '招聘人数',
        ];

        foreach($keys as $k => $v)
        {
            if(!Language::where('key_name', $k)->find())
            {
                Language::create([
                    'key_name' => $k,
                    'zh_name' => $v,
                ]);
            }
        }

    }
}