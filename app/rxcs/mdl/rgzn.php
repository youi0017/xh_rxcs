<?php namespace mdl;

/*
 * 试题：人工智能
 * 20181011
 */
class rgzn extends _base
{
	const C1=15;//15 --> 人工计算ti数组数目

	
	//试题
	public function t1($sn=0)
	{
		$ti=
		[
		//题1
			[	//题目timu
				'tm'=>'你是一个逻辑和抽象思维能力比较强的人吗? ',
				//问题图片
				//'img'=>'t1_0.jpg',
				//选项xuanxiang
				'xx'=>['是', '不是'],
				//答案daan
				'da'=>[1, 0]
			],

		//题2
			[
				'tm'=>'你是否愿意不断地去学习那些新的东西？',
				//'img'=>'t1_1.jpg',
				'xx'=>['是','不是'],
				'da'=>[1,0],
			],
			
		//题3
			[
				'tm'=>'当你遇到一些问题和困难的时候，你是否有足够的耐心和毅力去独自解决这些问题？',
				//'img'=>'t1_1.jpg',
				'xx'=>['是','不是'],
				'da'=>[1,0],
			],
			
		//题4
			[
				'tm'=>'你是否有很强的好奇心去研究和探索那些未知的领域？',
				//'img'=>'t1_1.jpg',
				'xx'=>['是','不是'],
				'da'=>[1,0],
			],
			
		//题5
			[
				'tm'=>"根据大图形中的符号或图案的规律，选择适当的图案填入大图形的空缺中？",
				'img'=>'t1_rgzn_4.jpg',
				'xx'=>['1','2','3','4','5','6'],
				'da'=>[0,0,0,1,0,0],
			],
			
		//题6
			[
				'tm'=>"根据大图形中的符号或图案的规律，选择适当的图案填入大图形的空缺中？",
				'img'=>'t1_rgzn_5.jpg',
				'xx'=>['1','2','3','4','5','6'],
				'da'=>[0,0,0,0,1,0],
			],
			
		//题7
			[
				'tm'=>"人工智能的目的是让机器能够(  )，以实现某些脑力劳动的机械化？",
				//'img'=>'t1_6.jpg',
				'xx'=>['具有完全的智能', '和人脑一样考虑问题','完全代替人',' 模拟、延伸和扩展人的智能'],
				'da'=>[0,0,0,1],
			],
			
		//题8
			[
				'tm'=>"1997年5月12日，轰动全球的人机大战中,”更深的蓝”战胜了国际象棋之子卡斯帕罗夫，这是？ ",
				//'img'=>'t1_6.jpg',
				'xx'=>['人工思维', ' 机器思维',' 人工智能',' 机器智能'],
				'da'=>[0,0,1,0],
			],
			
		//题9
			[
				'tm'=>"盲人看不到一切事物，他们可以通过不同的人的声音辨别发声者，这是智能的( )方面？",
				//'img'=>'t1_6.jpg',
				'xx'=>['行为能力', '感知能力 ','思维能力','学习能力'],
				'da'=>[0,1,0,0],
			],
			
		//题10
			[
				'tm'=>'我的秘书还未到参加选民的年龄，我的秘书有着漂亮的头发。所以我的秘书是个未满18周岁的姑娘？',
				//'img'=>'t1_1.jpg',
				'xx'=>['是','否'],
				'da'=>[0,1],
			],
			
		//题11
			[
				'tm'=>"正方形是有角的图形，假如一个图形没有角，那么对这个图形的表述正确的是？ ",
				//'img'=>'t1_6.jpg',
				'xx'=>['这个图形是个圆', '无确切结论 ','这个图形不是正方形'],
				'da'=>[0,0,1],
			],
			
		//题12
			[
				'tm'=>"因特网上专门提供网上搜索的工具是？ ",
				//'img'=>'t1_6.jpg',
				'xx'=>['查找 ', '查询 ','搜索引擎',' 查看'],
				'da'=>[0,0,1,0],
			],
			
		//题13
			[
				'tm'=>"域名中的后缀.com表示机构所属类型是？",
				//'img'=>'t1_6.jpg',
				'xx'=>[' 军事机构 ', '政府机构 ','教育机构',' 商业公司'],
				'da'=>[0,0,0,1],
			],
			
		//题14
			[
				'tm'=>"如果你突然停车，那么跟在后面的一辆卡车将撞上你;如果你不这样做,你将撞到一个妇女，所以？",
				//'img'=>'t1_6.jpg',
				'xx'=>['行人不应在马路上行走', '那辆卡车车速太快 ','你要么让后面那辆卡车撞上，要么撞到那个妇女'],
				'da'=>[0,0,1],
			],
			
		//题15
			[
				'tm'=>"前进不见得死得光荣，后退没死也不见得是耻辱，所以？",
				//'img'=>'t1_6.jpg',
				'xx'=>['后退意为死得光荣', '前进意为不死就是耻辱','前进意为死得光荣','都不对'],
				'da'=>[0,0,0,1],
			],
			
		];
		//var_dump($ti);exit;

		shuffle($ti);
		return $ti;
		return isset($ti[$sn]) ? $ti[$sn] : false;	
	}


}
