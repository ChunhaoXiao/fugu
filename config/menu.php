<?php
return [
	[
		'group' => '内容管理',
		'items' => [
			[
				'name' => '关于我们',
				'url' => '/admin/about/index',
			],
			[
				'name' => '主要产业',
				'url' => '/admin/business/index',
			],
			[
				'name' => '产品中心',
				'url' => '/admin/product/index',
			],
			[
				'name' => '新闻中心',
				'url' => '/admin/news/index',
			],
			[
				'name' => '招商加盟',
				'url' => '/admin/join/index'
			],
			[
				'name' => '人力资源',
				'url' => '/admin/hr/index',
			]
		]
	],

	[
		'group' => '栏目管理(勿删)',
		'items' => [
			[
				'name' => '栏目列表',
				'url' => '/admin/category/index',
			],
		]
	],

	[
		'group' => '系统设置',
		'items' => [
			[
				'name' => '基本设置',
				'url' => '/admin/config/create',
			],

			[
				'name' => '轮播图',
				'url' => '/admin/swiper/index',
			],

			[
				'name' => '清除缓存',
				'url' => '/admin/clearcache/index',
			],
			[
				'name' => '联系方式',
				'url' => '/admin/contact/create',
			],

			[
				'name' => '语言管理',
				'url' => '/admin/lang/create',
			]
		]
	],
];