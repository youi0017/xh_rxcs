<?php namespace mdl;

/*
 * 试题基类：基类有“性格测试题”
 * 20181001
 */
abstract class _base
{
	const C0=5;//5;//--> 人工“计算性格测试题t0”数目
/*
	private static $meer;
	public static function meer()
	{
		if(!isset(self::$meer)) self::$meer=new self;
		return self::$meer;
	}
*/	
	//shiti方法，用于继承 20181001
	abstract public function t1($sn);
	
	/**
	 * 性格测试
	 * @sn int 题号
	 * @return array|false 
	 * 20181001
	 */
	public function t0($sn=0)
	{
		$ti=
		[
			[	//题目timu
				'tm'=>'若有块地是养老用的房子,你会盖在哪? ',
				//问题图片
				'img'=>'t0_1.jpg',
				//答案daan
				'da'=>[1,2,3,4]
			]
			,[	//题目timu
				'tm'=>'吃西餐最先动那一道?',
				'img'=>'t0_2.jpg',
				'da'=>[1,2,3,4]
			]
			,[	//题目timu
				'tm'=>'如果你可以化为天空的一隅,希望自己成为什么呢? ',
				'img'=>'t0_3.jpg',
				'da'=>[1,2,3,4]
			]
			,[
				'tm'=>'如果你在选择窗帘的颜色,你会选择以下哪种颜色的窗帘呢?',
				'img'=>'t0_4.jpg',
				'da'=>[1,2,3,4,5,6]
			]
			,[
				'tm'=>'挑选一种你最喜爱的水果吧！',
				'img'=>'t0_5.jpg',
				'da'=>[1,2,3,4,5,6,7,8,9,10,11]
			]
			
			,[
				'tm'=>'若你是以下这些动物,你希望身上搭配什么颜色的毛呢?',
				'img'=>'t0_6.jpg',
				'xx'=>[],
				'da'=>[1,2,3,4]
			]
			
		];

		shuffle($ti);
		return $ti;
		
		return isset($ti[$sn]) ? $ti[$sn] : false;
	}
	


}
