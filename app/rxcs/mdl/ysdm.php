<?php namespace mdl;

/*
 * 试题：VR影视动漫设计师
 * 20181026
 */
class ysdm extends _base
{
	const C1=15;//--> 人工计算ti数组数目

	//试题
	public function t1($sn=0)
	{
		$ti=
		[
			[
				'tm'=>'下面四位，哪个是动作明星？',
				'xx'=>['成龙','周星驰','刘德华','面筋哥'],
				'da'=>[1,0,0,0],
			],
			[
				'tm'=>'以下哪个是剪辑软件？',
				'img'=>'t1_ysdm_1.png',
				'da'=>[0,0,1,0],
			],	
			[
				'tm'=>'以下设备哪个像素更好？',
				'img'=>'t1_ysdm_2.png',
				'da'=>[1,0,0,0],
			],		
			[
				'tm'=>'以下哪个是娱乐短视频APP？',
				'img'=>'t1_ysdm_3.png',
				'da'=>[0,0,1,0],
			],	
			[
				'tm'=>'以下电影中，哪部是国产三维动画？',
				'img'=>'t1_ysdm_4.png',
				'da'=>[1,0,0,0],
			],
			[
				'tm'=>'下面那部电影是3D电影？',
				'img'=>'t1_ysdm_5.png',
				'da'=>[0,0,1],
			],
			[
				'tm'=>'图中模型是由几个正方形组成的？',
				'img'=>'t1_ysdm_6.png',
				'da'=>[0,1,0],
			],
			[
				'tm'=>'下面哪个角色不是漫威人物？',
				'img'=>'t1_ysdm_7.png',
				'da'=>[0,0,1],
			],
			[
				'tm'=>'摄影通常用到的三脚架是？',
				'img'=>'t1_ysdm_8.png',
				'da'=>[0,0,1],
			],
			[
				'tm'=>'下面哪款软件是3D软件？',
				'img'=>'t1_ysdm_9.png',
				'da'=>[0,0,1],
			],
			[
				'tm'=>'下列哪个不是游戏人物？',
				'img'=>'t1_ysdm_10.png',
				'da'=>[0,0,1],
			],
			[
				'tm'=>'哪个不是动漫人物？',
				'img'=>'t1_ysdm_11.png',
				'da'=>[0,0,1],
			],
			[
				'tm'=>'下列哪个是素描？',
				'img'=>'t1_ysdm_12.png',
				'da'=>[0,1,0],
			],		
			[
				'tm'=>'下列哪个是国产二维动画？',
				'xx'=>['小鲤鱼历险记','大圣归来','冰雪奇缘'],
				'da'=>[1,0,0],
			],
			[
				'tm'=>'下列哪个用来编辑视频最方便？',
				'img'=>'t1_ysdm_13.png',
				'da'=>[0,0,1],
			]					
		];
		//var_dump($ti);exit;

		shuffle($ti);
		return $ti;
		return isset($ti[$sn]) ? $ti[$sn] : false;	
	}


}
