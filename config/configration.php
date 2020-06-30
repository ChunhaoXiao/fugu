<?php
return [
	[
		'name' => 'title',
		'type' => 'text',
		'label' => '标题',
	],
	[
		'name' => 'logo',
		'type' => 'file',
		'label' => '顶部logo',
	],
	[
		'name' => 'bottom_logo',
		'type' => 'file',
		'label' => '底部logo',
	],

	[
		'name' => 'keyword',
		'type' => 'text',
		'label' => '关键字',
	],
	[
		'name' => 'description',
		'type' => 'text',
		'label' => '描述',
	],
	[
		'name' => 'copy_right',
		'type' => 'text',
		'label' => '底部版权信息',
	],
	[
		'name' => 'lisence',
		'type' => 'text',
		'label' => '备案号',
	],
	[
		'name' => 'allow_visit',
		'type' => 'radio',
		'label' => '允许访问',
		'options' => [
			[
				'label' => '是',
				'value' => 1,
			],

			[
				'label' => '否',
				'value' => 0
			],
		],
		'default' => 1,
	],
	[
		'name' => 'index_about_bgimg',
		'type' => 'file',
		'label' => '首页关于我们背景图',
	],
	[
		'name' => 'index_product_bgimg',
		'type' => 'file',
		'label' => '首页产品中心背景图'
	],
	[
		'name' => 'join_picture',
		'type' => 'file',
		'label' => '招商加盟左侧图片',
	],
	[
		'name' => 'hr_picture',
		'type' => 'file',
		'label' => '人才理念左侧图片',
	]
];