<?php

use think\migration\Seeder;
use app\common\model\Category;

class AboutSeeder extends Seeder
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
        $category = Category::type('about')->with('subcates')->find();
        foreach($category->subcates as $v)
        {
            if($v->name == '公司介绍')
            {
                $data['content'] = '大连富谷集团位于黄海之滨——大连庄河，紧邻庄河港，风景优美，交通便利。公司创建于1981年，是一家集水产品种苗繁育、养殖、加工、销售、科研、产业旅游为一体的综合性现代渔业企业，具有自营进出口权。

每年国际出口河鲀鱼数千吨。企业海陆占地面积近1000公顷，下设10个子公司和一个水产研发中心。公司先后被国家八部认定为“国家农业产业化重点龙头企业”， “富谷”牌商标被国家工商总局认定为“中国驰名商标”被国家农业部确定为：“国家红鳍东方鲀良种场”、“河豚鱼健康养殖示范基地”，2016年9月，通过农业部备案的河鲀鱼源基地资质认证；2017年1月份，通过养殖河鲀加工企业的认证资质。

富谷集团在同行业一直处于领先地位，完善的配套设施，科学的产业布局，形成了独具特色的产业体系。

富谷现代渔业生态园区于2016年开工建设并投产，占地300亩，总投资6个亿，建设期两年。主要建设四大功能区：设施渔业功能区、水产品加工产业化功能区、科技研发功能区、渔业旅游功能区。工程集成现代工业和高新生物技术，重点建设高产量、全控制、精准化、标准化、模块化、高循环的工业化循环水养殖系统近100000m3。渔业产业旅游，是把该园区现代渔业生产和休闲观光旅游紧密融合，集渔业观赏、垂钓、赶海、餐饮、购物业于一体，搭建庄河土特产的销售平台，助推庄河的土特产走出庄河，走向全国，从而推动产业升级，带动地方经济发展，造福庄河父老乡亲。此旅游项目将于2018年5月1日正式投入运营。';
            }
            elseif($v->name == '董事长致辞')
            {
                $data['content'] = '在人杰地灵的黄海之滨，富谷人艰苦创业执着奋进，谱写了驾海驭浪的壮美篇章，肩负起振兴现代海洋渔业的使命和担当。“胆识开先河，激情创未来”，是富谷人永恒的理念。为了创造中国河豚产业的辉煌，为了实现富谷百年兴旺的梦想，富谷人愿携手有识之士共创美好明天。';
            }
            elseif($v->name == '发展历程')
            {
                $data['content'] = "<p><img src=/uploads/test/Fanzimg.png></p>";
            }
            elseif ($v->name == '企业文化') 
            {
                $data['content'] = "<p><img src=/uploads/test/whuaimg.jpg></p>";
            }
            elseif(strpos($v->name, '荣誉') !== false)
            {
                $data['content'] = '';
            }
            elseif($v->name == '企业视频')
            {
                $domain = request()->host()?? 'wap.weixinkefu.top';
                $data['content'] = '视频';
                //$data['content'] == '<p>&nbsp;<video src="http://'.$domain.'/uploads/test/video.mp4" poster="" controls="controls">您的浏览器不支持video播放</video>&nbsp;</p>';

            }
            else 
            {
                $data['content'] = '';
            }
            $v->aboutus()->save($data);
        }
    }
}