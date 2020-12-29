<?php namespace ctl;
use lib\assign;
use lib\rtn;

/**
 * 题库
 * 
 * 
 * 
 */
class tiku extends \clib\ctl
{

	public function cs()
	{
		echo chr(65);
		
	}

	
	//以列表形式显示题库中的所有类别
	//注：只需制作视图即可 
	public function dft()
	{
		//取出所有专业类别，做为列表的数据
		$zys = index::zys();

		//加载 tiAll.tpl 视图
		include assign::load('tiAll');
	}

	//通过取传入的GET参数 tkey 将，试题数据生成试卷
	//@tkey string [必需] GET方法传入的试题类别 
	public function x()
	{
		//判断$_GET['tkey']，值必需是self::zys()的索引
		if(!isset($_GET['tkey'])) rtn::ep('未传入试题类别！');
		//取回 试题类别 
		$tkey=$_GET['tkey'];
		$zys = index::zys();

		if(!isset($zys[$tkey])) rtn::mep('不存在的试题类别！');

		//exit('当前试题类别是: '.$_GET['tkey']);
		$mdl = "\\mdl\\$tkey";
		$dArr = new $mdl();
		$dArr = $dArr->t1();
		//var_dump($dArr);exit;

		$da=function($daArr){
			foreach($daArr as $i => $v){
				if($v==1)
				{
					return $i;
				}
			}

		};

		
		//加载 tiX.tpl 视图
		include assign::load('tiX');
	}

	//专业配置 
	public static function zys($kname='')
	{
		$zys=[
			'zhcs'=>'综合测试'
			,'ysdm'=>'VR影视动漫游戏开发'//VR影视动漫设计师
			,'ui'=>'新媒体UI创意设计师'
			,'kjcy'=>'VR空间创意设计师'
			,'rgzn'=>'人工智能'
			,'dsj'=>'大数据应用工程师'
			,'web'=>'互联网平台开发工程师'
			,'yun'=>'网络信息安全工程师'//云计算网络工程师
			,'app'=>'移动APP软件开发工程师'
			,'dzjj'=>'电子竞技运动与管理'//电子竞技运管精英
			,'yds'=>'云电子商务运营'
			,'cw'=>'互联网财务管理'			
			,'hz'=>'会展设计策划与管理'//互联网+会展
		];

		

		return isset($zys[$kname]) ? $zys[$kname] : ($kname=='' ? $zys : rtn::mep('专业不存在！'));
	}

	
}




