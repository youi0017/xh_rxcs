<?php namespace mdl;

/*
 * 试题：互联网运营与创业
 * 20191229085335
 */
class yycy extends _base
{
	const C1=15;//--> 人工计算ti数组数目
	const NAME='互联网运营与创业';

	//试题
	public function t1($sn=0)
	{
		$ti=
		[
			[	
				'tm'=>'下列不属于跨境电商平台的是？',
				'img'=>'t1_yycy_0.jpg',
				'da'=>[0,0,0,1]
			],
			[	
				'tm'=>'小芳在淘宝上购买了一条牛仔裤，但是没有购买运费险，小芳在收到货物之后觉得不喜欢，想要退货，请问运费由谁承担？',
				'xx'=>['小芳承担来回运费','卖家承担来回运费','阿里巴巴承担运费','与商家协商解决'],
				'da'=>[1,0,0,0]
			],
			[	
				'tm'=>'淘宝购物过程中，比较安全的沟通工具有？',
				'img'=>'t1_yycy_2.jpg',
				'da'=>[0,1,0,0]
			],
			[	
				'tm'=>'以下哪句回复买家的话语较为得体？',
				'xx'=>['你好，很高兴为你服务，你刚咨询的那件宝贝我们还有很多货，亲喜欢的话可以直接拍下即可，我们当天就可以发货','你到底要问多少问题，还买不买','这个问题在宝贝描述里面写着了，自己看一下吧','你脑子有问题吗,问这么白痴的问题'],
				'da'=>[1,0,0,0]
			],
			[	
				'tm'=>'这位浮夸男正在表演的是？',
				'img'=>'t1_yycy_4.jpg',
				'xx'=>['伤口撒盐','烧烤撒盐','牛排撒盐','鸡排撒盐'],
				'da'=>[0,0,1,0]
			],
			[	
				'tm'=>'当一个人去超市，话说到一半就开始哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈，请问他可能要买的是什么？',
				'img'=>'t1_yycy_5.jpg',
				'da'=>[1,0,0,0]
			],
			[	
				'tm'=>'以下哪个平台不属于阿里巴巴旗下品牌？',
				'img'=>'t1_yycy_6.jpg',
				'da'=>[0,1,0,0]
			],
			[	
				'tm'=>'A、B两家店铺，其中A有品牌授权，B没有品牌授权，其他条件都一样，我们在购买时应优先考虑哪一家？',
				'xx'=>['A店铺','B店铺','A、B都可以','A、B都不可以'],
				'da'=>[1,0,0,0]
			],
			[	
				'tm'=>'以下哪些网站不属于搜索引擎？',
				'img'=>'t1_yycy_8.jpg',
				'da'=>[0,0,0,1]
			],
			[	
				'tm'=>'“滴~滴滴”是哪一个的暗号？',
				'img'=>'t1_yycy_9.jpg',
				'da'=>[0,1,0,0]
			],
			[	
				'tm'=>'这位古装男跳的舞蹈是',
				'img'=>'t1_yycy_10.jpg',
				'xx'=>['海草舞','发财舞','拍灰舞','C哩C哩'],
				'da'=>[1,0,0,0]
			],
			[	
				'tm'=>'新媒体运营是干什么的？',
				'xx'=>['码字人员','物资运输团队','魔术师','品牌推广'],
				'da'=>[0,0,0,1]
			],
			[	
				'tm'=>'下面那个属于百度公司旗下的产品？',
				'img'=>'t1_yycy_12.jpg',
				'da'=>[0,1,0,0]
			],
			[	
				'tm'=>'微信是(  )公司推出的一款网络快速发送语音短信、视频、图片和文字,支持多人群聊的手机聊天软件',
				'img'=>'t1_yycy_13.jpg',
				'da'=>[0,0,1,0]
			],
			[	
				'tm'=>'下列哪个不属于网上支付平台?',
				'img'=>'t1_yycy_14.jpg',
				'da'=>[0,0,0,1]
			],
			
			









		];
		//var_dump($ti);exit;
		shuffle($ti);
		return $ti;
		return isset($ti[$sn]) ? $ti[$sn] : false;	
	}


}