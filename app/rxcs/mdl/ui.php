<?php

 namespace mdl;

/*
 * 试题：新媒体UI创意设计师
 * 20181017
 */
class ui extends _base
{
	const C1=15;//--> 人工计算ti数组数目

	
	//试题
	public function t1($sn=0)
	{
		$ti=
		[
			[
				'tm'=>'最早的大众传媒媒介是？',
				'img'=>'t1_ui_0.jpg',
				'da'=>[0,0,0,1]
			],

			[
				'tm'=>'以下属于娱乐短视频类应用的是？',
				'img'=>'t1_ui_1.jpg',
				'da'=>[0,0,1,0]
			],

			[
				'tm'=>'以下哪款软件我们可以用它进行宣传文案的编辑与改写？',
				'img'=>'t1_ui_2.jpg',
				'da'=>[1,0,0,0]
			],

			[
				'tm'=>'农夫山泉的卖点是“农夫山泉有点甜”，请发挥想象力，在脑海中描绘出一幅广告情景画面，并在下面选项找到你认为合适的词语？',
				'img'=>'t1_ui_3.jpg',
				'da'=>[0,0,0,1]
			],

			[
				'tm'=>'下列哪项不是新媒体的特点？',
				'img'=>'t1_ui_4.jpg',
				'da'=>[0,0,1,0]
			],

			[
				'tm'=>'下列哪项不属于网络类型的新媒体？',
				'img'=>'t1_ui_5.jpg',
				'da'=>[0,1,0,0]
			],

			[
				'tm'=>'以下工作中，新媒体文案的工作内容是？',
				'img'=>'t1_ui_6.jpg',
				'da'=>[0,0,0,1]
			],

			[
				'tm'=>'在我们进行设计海报和图标时下面的哪款软件用不到？',
				'img'=>'t1_ui_7.jpg',
				'da'=>[0,0,1,0]
			],

			[
				'tm'=>'微视、抖音等短视频App最近都推出一项丧心病狂的新功能，请选出是哪一项？',
				'img'=>'t1_ui_8.jpg',
				'da'=>[0,1,0,0]
			],

			[
				'tm'=>'下列手机图标样式中那个不属于2D图标？',
				'img'=>'t1_ui_9.jpg',
				'da'=>[0,0,0,1]
			],

			[
				'tm'=>'下列那个系统不属于手机系统平台？',
				'img'=>'t1_ui_10.jpg',
				'da'=>[0,0,1,0]
			],

			[
				'tm'=>'人们的浏览手机网页的习惯是？',
				'img'=>'t1_ui_11.jpg',
				'da'=>[0,0,0,1]
			],

			[
				'tm'=>'下列哪一种不属于UI设计范畴？',
				'img'=>'t1_ui_12.jpg',
				'da'=>[0,0,1,0]
			],

			[
				'tm'=>' 以下UI设计的细分研究方向中不包含以下哪一项？',
				'img'=>'t1_ui_13.jpg',
				'da'=>[0,1,0,0]
			],

			[
				'tm'=>'UI设计是指对互联网、移动互联网、软件等产品的整体设计不包括？',
				'img'=>'t1_ui_14.jpg',
				'da'=>[0,0,0,1]
			],
		];
		//var_dump($ti);exit;

		shuffle($ti);
		return $ti;
		return isset($ti[$sn]) ? $ti[$sn] : false;	
	}


}
