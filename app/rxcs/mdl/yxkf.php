<?php namespace mdl;

/*
 * 试题：游戏开发与运营
 * 20191229085335
 */
class yxkf extends _base
{
	const C1=15;//--> 人工计算ti数组数目
	const NAME='游戏开发与运营';

	//试题
	public function t1($sn=0)
	{
		$ti=
		[
			[	
				'tm'=>'下列哪款游戏属于MOBA五五对战类？',
				'img'=>'t1_yxkf_0.jpg',
				'da'=>[1,0,0,0]
			],
			[	
				'tm'=>'游戏开发专业就是主要玩游戏的？',
				'xx'=>['正确','错误'],
				'da'=>[0,1,0,0]
			],
			[	
				'tm'=>'以下哪个是三维模型？',
				'img'=>'t1_yxkf_2.jpg',
				'da'=>[1,0,0,0]
			],
			[	
				'tm'=>'以下哪个是游戏模型？',
				'img'=>'t1_yxkf_3.jpg',
				'da'=>[0,1,0,0]
			],
			[	
				'tm'=>'以下电影中，哪部是国产三维动画？',
				'img'=>'t1_yxkf_4.jpg',
				'da'=>[1,0,0,0]
			],
			[	
				'tm'=>'图中模型是由几个立方体组成的？',
				'img'=>'t1_yxkf_5.jpg',
				'xx'=>['2个','3个','4个'],
				'da'=>[0,1,0]
			],
			[	
				'tm'=>'下面哪个是游戏场景设计？',
				'img'=>'t1_yxkf_6.jpg',
				'da'=>[0,1,0,0]
			],
			[	
				'tm'=>'什么是游戏CG动画？',
				'xx'=>['是一种游戏','是一种体育运动','是游戏的动画宣传片'],
				'da'=>[0,0,1]
			],
			[	
				'tm'=>'开发一款游戏需要哪些技能？',
				'xx'=>['疯狂的玩游戏','从来不玩游戏','学习各种开发软件体验各种类型游戏'],
				'da'=>[0,0,1]
			],
			[	
				'tm'=>'下列哪个不是游戏人物？',
				'img'=>'t1_yxkf_9.jpg',
				'da'=>[0,0,1,0]
			],
			10=>[	
				'tm'=>'下面哪个角色不是漫威人物？',
				'img'=>'t1_yxkf_10.jpg',
				'da'=>[0,0,1,0]
			],
			[	
				'tm'=>'哪个不是动漫人物？',
				'img'=>'t1_yxkf_11.jpg',
				'da'=>[0,0,1,0]
			],
			[	
				'tm'=>'下列哪个是国产二维动画？',
				'xx'=>['小鲤鱼历险记','大圣归来','冰雪奇缘',],
				'da'=>[1,0,0,0]
			],
			[	
				'tm'=>'英雄联盟角色中，亚索一直是大家经常玩的英雄，那么请问亚索的大招叫什么名字？',
				'xx'=>['雷霆半月斩','狂风绝息斩','断钢闪',],
				'da'=>[0,1,0,0]
			],
			
			[	
				'tm'=>'下面哪款软件是3D软件？',
				'img'=>'t1_yxkf_14.jpg',
				'da'=>[0,0,1,0]
			],








		];
		//var_dump($ti);exit;
		shuffle($ti);
		return $ti;
		return isset($ti[$sn]) ? $ti[$sn] : false;	
	}


}
