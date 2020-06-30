<?php

use think\migration\Seeder;
use app\common\model\Category;

class NavSeeder extends Seeder
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
                'name' => '关于我们',
                'parent_id' => 0,
                'order' => 0,
                'type' => 'about',
                'url' => 'about/index',
                'bg_image' => 'test/banner_gy.jpg',
                'en_name' => 'About us',
                'subcates' => [
                    [
                        'name' => '董事长致辞',
                        'order' => 0,
                        'icon' => 'test/gysw_1.png',
                        'en_name' => 'CEO speech',
                    ],

                    [
                        'name' => '公司介绍',
                        'order' => 1,
                        'icon' => '',
                        'en_name' => 'Introduction',
                       
                    ],
                    [
                        'name' => '发展历程',
                        'order' => 2,
                        'icon' => 'test/gysw_2.png',
                        'en_name' => 'History',
                    ],
                    [
                        'name' => '企业文化',
                        'order' => 3,
                        'icon' => 'test/gysw_3.png',
                        'en_name' => 'Corporate culture',
                    ],
                    [
                        'name' => '核心价值',
                        'order' => 4,
                        'icon' => 'test/gysw_4.png',
                        'en_name' => 'Core value',
                    ],
                    [
                        'name' => '荣誉资质',
                        'order' => 5,
                        'icon' => 'test/gysw_5.png',
                        'en_name' => 'Honors',
                    ],
                    [
                        'name' => '企业视频',
                        'order' => 6,
                        'en_name' => 'Video',
                    ]
                ]
            ],

            [
                'name' => '主要产业',
                'order' => 1,
                'type' => 'business',
                'parent_id' => 0,
                'url' => 'business/index',
                'bg_image' => 'test/banner_cy.jpg',
                'en_name' => 'Main industries',
                'subcates' => [
                    [
                        'name' => '现代化渔业园区',
                        'order' => 0,
                        'bg_image' => 'test/chanyimg_1.jpg',
                        'en_name' => 'Modern fishery industry zone',
                    ],
                    [
                        'name' => '海洋牧场',
                        'order' => 1,
                        'bg_image' => 'test/chanyimg_2.jpg',
                        'en_name' => 'Ocean ranch',
                    ],
                    [
                        'name' =>'水产品加功',
                        'order' => 2,
                        'bg_image' => 'test/chanyimg_3.jpg',
                        'en_name' => 'Aquatic Product Processing',
                    ],
                    [
                        'name' => '冷链物流',
                        'order' => 3,
                        'bg_image' => 'test/chanyimg_4.jpg',
                        ;'en_name' => 'Cold chain logistics',
                    ],
                    [
                        'name' => '休闲渔业&酒店',
                        'order' => 4,
                        'bg_image' => 'test/chanyimg_5.jpg',
                        'en_name' => 'Leisure Fishing&hotel',
                    ],
                    [
                        'name' => '科技研发',
                        'order' => 6,
                        'bg_image' => 'test/chanyimg_6.jpg',
                        'en_name' => 'Sci.&Tech research and development',

                    ]
                ]
            ],

            [
                'name' => '产品中心',
                'order' => 2,
                'type' => 'product',
                'parent_id' => 0,
                'url' => 'product/index',
                'bg_image' => 'test/banner_cpzx.jpg',
                'en_name' => 'Product center',
                'subcates' => [
                    [
                        'name' => '活品&鲜品',
                        'order' => 1,
                        'en_name' => 'Fresh Product',
                    ],
                    [
                        'name' => '冻品',
                        'order' => 2,
                        'en_name' => 'Freezing food',
                    ],
                    [
                        'name' => '制品',
                        'order' => 3,
                        'en_name' => 'manufacture',
                    ],
                    [
                        'name' => '休闲食品',
                        'order' => 4,
                        'en_name' => 'Leisure food',
                    ],
                    [
                        'name' => '海参系列',
                        'order' => 5,
                        'en_name' => 'Sea cucumber',
                    ]
                ]
            ],
            [
                'name' => '新闻中心',
                'order' => 3,
                'type' => 'news',
                'parent_id' => 0,
                'url' => 'news/index',
                'bg_image' => 'test/banner_xw.jpg',
                'en_name' => 'News center',
                'subcates' => [
                    [
                        'name' => '集团新闻',
                        'order' => 1,
                        'en_name' => 'Group news',
                    ],
                    [
                        'name' => '行业动态',
                        'order' => 2,
                        'en_name' => 'Industry news',
                    ],
                    [
                        'name' => '社会责任',
                        'order' => 3,
                        'en_name' => 'social responsibility',
                    ],
                ]

            ],

            [
                'name' => '招商加盟',
                'order' => 5,
                'type' => 'join',
                'parent_id' => 0,
                'url' => 'join/index',
                'bg_image' => 'test/banner_zsjm.jpg',
                'en_name' => 'Join',
            ],

            [
                'name' => '人力资源',
                'order' => 4,
                'type' => 'hr',
                'parent_id' => 0,
                'url' => 'hr/index',
                'bg_image' => 'test/banner_rl.jpg',
                'en_name' => 'Human resource',
                'subcates' => [
                    [
                        'name' => '人才理念',
                        'order' => 0,
                        'en_name' => 'Human Idea'
                    ],
                    [
                        'name' => '招贤纳士',
                        'order' => 1,
                        'en_name' => 'Recruitment',
                    ],
                ]
            ],
            [
                'name' => '联系我们',
                'order' => 15,
                'type' => 'contact',
                'parent_id' => 0,
                'url' => 'contact/index',
                'bg_image' => 'test/banner_lianx.jpg',
                'en_name' => 'Contact us',
                
            ]
        ];

        foreach($datas as $k => $v)
        {
            if(!Category::where('name', $v['name'])->find())
            {
                $res = Category::create($v);
                if(!empty($v['subcates']))
                {
                    $res->subcates()->saveAll($v['subcates']);
                }
            }
        }
    }
}