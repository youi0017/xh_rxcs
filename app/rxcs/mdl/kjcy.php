<?php

 namespace mdl;

/*
 * 试题：VR空间创意设计师
 * 20181017
 */
class kjcy extends _base
{
	const C1=15;//--> 人工计算控制ti显示数目

	
	//试题
	public function t1($sn=0)
	{
		$ti=
		[
		    [
			    'tm'=>'下面四张效果图图，哪个是网咖场所效果图？',  //题目
			    'img'=>"t1_kjcy_0.jpg",    //图片路径
			    'da'=>[1,0,0,0]     //答案
		    ],
		    [
		        'tm'=>'以下哪个是与室内设计有关的软件？',  //题目
		        'img'=>"t1_kjcy_1.jpg",    //图片路径
		        'da'=>[0,1,0,0]     //答案
		    ],
		    [
		        'tm'=>'以下几件物品中哪个是VR眼镜？',  //题目
		        'img'=>"t1_kjcy_2.jpg",    //图片路径
		        'da'=>[0,0,1,0]     //答案
		    ],
		    [
		        'tm'=>'以下网咖效果图中，你觉得桌子上不适合放什么？',  //题目
		        'img'=>"t1_kjcy_3.jpg",    //图片路径
		        'da'=>[0,0,1,0]     //答案
		    ],
		    [
		        'tm'=>'以下四张效果图，哪一张是KTV？',  //题目
		        'img'=>"t1_kjcy_4.jpg",    //图片路径
		        'da'=>[0,1,0,0]     //答案
		    ],
		    [
		        'tm'=>'以下四款软件，哪一款是用来做VR的？',  //题目
		        'img'=>"t1_kjcy_5.jpg",    //图片路径
		        'da'=>[0,0,1,0]     //答案
		    ],
		    [
		        'tm'=>'下列商业项目看板中，你觉得哪一个是与VR空间创意专业无关的看板？',  //题目
		        'img'=>"t1_kjcy_6.jpg",    //图片路径
		        'da'=>[0,1,0,0]     //答案
		    ],
		    [
		        'tm'=>'如果你去量房，你会带哪一样去量房？',  //题目
		        'img'=>"t1_kjcy_7.jpg",    //图片路径
		        'da'=>[1,0,0,0]     //答案
		    ],
		    [
		        'tm'=>'如果一个网咖的老板，让你为他选择他的网咖的座椅，你会帮他选哪个？',  //题目
		        'img'=>"t1_kjcy_8.jpg",    //图片路径
		        'da'=>[1,0,0,0]     //答案
		    ],
		    [
		        'tm'=>'下面哪款软件是与室内设计软件相关的？',  //题目
		        'img'=>"t1_kjcy_9.jpg",    //图片路径
		        'da'=>[0,0,1,0]     //答案
		    ],
		    [
		        'tm'=>'下列图片中，哪个场景是用VR眼镜看到的场景？',  //题目
		        'img'=>"t1_kjcy_10.jpg",    //图片路径
		        'da'=>[0,0,0,1]     //答案
		    ],
		    [
		        'tm'=>'以下哪一张是室内手绘效果图？',  //题目
		        'img'=>"t1_kjcy_11.jpg",    //图片路径
		        'da'=>[0,1,0,0]     //答案
		    ],
		    [
		        'tm'=>'王叔叔家里装修，请你选择出与装修无关的器具？',  //题目
		        'img'=>"t1_kjcy_12.jpg",    //图片路径
		        'da'=>[0,0,1,0]     //答案
		    ],
		    [
		        'tm'=>'以下软装家具中，哪一个是新中式风格的软装家具？',  //题目
		        'img'=>"t1_kjcy_13.jpg",    //图片路径
		        'da'=>[0,1,0,0]     //答案
		    ],
		    [
		        'tm'=>'以下平面图中 哪个不是沙发平面图？',  //题目
		        'img'=>"t1_kjcy_14.jpg",    //图片路径
		        'da'=>[0,0,1,0]     //答案
		    ],
		];
		//var_dump($ti);exit;

		shuffle($ti);
		return $ti;
		return isset($ti[$sn]) ? $ti[$sn] : false;	
	}


}
