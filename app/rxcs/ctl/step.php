<?php namespace ctl;
use lib\assign;
use lib\rtn;


class step extends \clib\ctl
{
	//开始测试
	public function dft()
	{
		rtn::mep("请从 <a href='/'>首页</a> 开始测试！");
	}

	//开始测试
	public function start()
	{
		//echo '新生入学测试系统';
		//include assign::load('index');

		if(!isset($_GET['zy'])) rtn::mep();
		$zyEN=$_GET['zy'];
		//取得专业名称
		$zyZH=index::zys($zyEN);
		//var_dump($zyEN,$zyZH);exit;
		
		include assign::load('start');
	}

	//设置开始(设置会话)
	public function ajx_start()
	{
		//姓名 和 专业 
		if(!isset($_GET['xm'], $_GET['xl'], $_GET['zy'])) rtn::err();

		//生成开始数据
		$localData=['xm'=>$_GET['xm'], 'xl'=>$_GET['xl'], 'zy'=>$_GET['zy'], 'tj'=>[]];
		$b=self::set_data($localData);

		//返回结果
		$b ? rtn::okk() : rtn::err();		
	}


/*
	//生成题
	public function ajx_tiCrt()
	{		
		//取出本地数据
		$ld=self::get_data();
		//var_dump($ld);exit;
		if(!$ld) rtn::mep("请从 <a href='/'>首页</a> 开始测试！");

		//试题段
		$grp=(isset($_GET['grp']) && $_GET['grp']=='t1')  ? 't1' : 't0';
		//试题序号
		$sn=(isset($_GET['sn']) && $_GET['sn']>0) ? $_GET['sn'] : 0;



		//试题数据类
		$zy='\\mdl\\'.$ld['zy'];
		//echo $zy;
		$cst=new $zy();

		//控制性格题的显示（注意：不是必需的）
		if($grp=='t0' && $_GET['sn']>$cst::C0-1)
		{
			$grp='t1';
			$sn=0;
		}
		

		//控制专业题的显示（注意：不是必需的）
		elseif($grp=='t1' && $_GET['sn']>$cst::C1-1)
		{
			$grp='t1';
			$sn=100;//不存在的即可，$dArr=false;
		}

		
		$dArr=$cst->$grp($sn);

		if($dArr==false)
		{//阶段试题结束(也可能结束)
			if($grp=='t1')
				rtn::err('题目已完成，即将生成测试结果', -1);
			else
			{//t0结束，开始t1
				$grp='t1';
				$sn=0;
				$dArr=$cst->$grp($sn);
			}
		}

		rtn::okk('ok', ['grp'=>$grp, 'sn'=>$sn, 'ti'=>$dArr]);

		//$dArr ? ($dArr==-1 ? rtn::okk('题目已完成，即将生成测试结果', -1) : rtn::okk('ok', $dArr) )  : rtn::err('系统错误，不能取出数据！') ;
	}
*/
	

	//试题页 20181001
	public function ti()
	{
		//取出本地数据
		$ld=self::get_data();
		//var_dump($ld);exit;
		if(!$ld) rtn::mep("请从 <a href='/'>首页</a> 开始测试！");

		//模版数据
		$xm=$ld['xm'];//姓名
		$zys=index::zys();//专业(中文)
		$zy=$zys[ $ld['zy'] ];//专业(中文)
		//var_dump($zys, $zy);exit;

		//取得试题类
		$zyMdl='\\mdl\\'.$ld['zy'];
		$zyMdl = new $zyMdl();
		$tis=json_encode([
			[
				'c'=>$zyMdl::C0,
				'tis'=> array_slice($zyMdl->t0(), 0 , $zyMdl::C0),
			],[
				'c'=>$zyMdl::C1,
				'tis'=>array_slice($zyMdl->t1(), 0 , $zyMdl::C1),
			]
		]);

		//var_dump($tis);exit;
					
		include assign::load('step');	
	}

	//测试结果
	public function jieguo()
	{
		//取出本地数据
		$ld=self::get_data();
		//var_dump($ld);exit;
		if(!$ld || !isset($ld['xm'],$ld['xl'],$ld['zy'],$ld['t0'],$ld['t1']) ) rtn::mep("请从 <a href='/'>首页</a> 开始测试！");

		//再次判断是否到测试页（注：这里不再判断20181003）

		//得出性格测试分值
		$ld['r']=[];
		$ld['r']['t0']=array_sum($ld['t0']);
		
		//得出专业测试结果
		$zy='\\mdl\\'.$ld['zy'];
		$zy_total=$zy::C1;
		$ld['r']['t1']= round(array_sum($ld['t1'])/$zy_total, 2)*100;
		//var_dump($ld['t1'], $zy_total);
		//如果结果小于80，则设置为80~85之间任意数
		if($ld['r']['t1']<80) $ld['r']['t1']=70+substr($ld['r']['t1'], 0, 1);

		//var_dump($ld);
		self::set_data($ld);//重设本地数据
		//$ld=self::get_data();var_dump($ld);exit;//测试新数据

		//取出性格测试结果
		$xg=\mdl\jieguo::xg($ld['r']['t0']);//取出性格结果



		include assign::load('jieguo');	
	}


	//打印测试结果页 20181005
	public function dayin()
	{
		//取出本地数据
		$ld=self::get_data();
		//var_dump($ld);exit;
		if(!$ld || !isset($ld['xm'],$ld['xl'],$ld['zy'],$ld['t0'],$ld['t1']) ) rtn::mep("请从 <a href='/'>首页</a> 开始测试！");

		$zyEN=$ld['zy'];
		$zys=index::zys();
		$zyZH=$zys[$zyEN];

/*
		if($zyEN=='zhcs')
		{
			//高频专业
			$most=['hz', 'cw', 'app'];
			shuffle($most);
			//var_dump($most);
			//除高频专业的其它专业
			$_oth= array_diff( array_keys(index::zys()), $most);
			//var_dump($_oth);
			$most[]=$_oth[array_rand($_oth, 1)];
			unset($most[0]);			
		}
*/		

		$xg=\mdl\jieguo::xg($ld['r']['t0']);//取出性格结果

		//var_dump($zyZH);exit;

		include assign::load('dayin');	
	}


	/**
	 * 取出高频专业
	 * 20181113
	 */
	public static function get_tjZy()
	{
		//高频专业-->此处定义
		$most=['web', 'jzzs', 'ysdm'];
		//需排除的专业-->此处定义
		$move=['zhcs'];
		shuffle($most);
		//var_dump($most);
		//除高频专业的其它专业
		$_oth= array_values( array_diff( array_keys(index::zys()), $most, $move) );
		//var_dump($_oth, $_oth[count($_oth)-1]);
		
		
		$most[]=$_oth[rand(1, count($_oth)-1)];//array_rand($_oth, 1)
		unset($most[0]);

		return $most;
	}


















	

	//设置会话数据
	//注意：每步间隔10分钟有效，过长时间则需重新测试
	public static function set_data($arr)
	{
		return \lib\cookie::SET('ks', json_encode($arr,JSON_UNESCAPED_UNICODE), 60*30);//
	}

	//取值
	//注：取到则返回，否则返回false
	public static function get_data()
	{
		$r=\lib\cookie::GET('ks');
		return $r ? json_decode($r, true) : false; 
	}




	//提交测试数据
	//lm:20181113
	public function ajx_tisSbt()
	{
		//参数处理
		if(!isset($_POST['t0'],$_POST['t1'])) rtn::err('提交数据不完整！');
		
		//取回本地基础数据
		$ld=self::get_data();

		//根据之前提交数据的形貌形式，将数据写入cookie
		$ld['t0']=$_POST['t0'];
		$ld['t1']=$_POST['t1'];

		//如果是综合测试，则取出推荐专业
		if($ld['zy']=='zhcs') $ld['tj']=self::get_tjZy();

		//重新设定本地数据
		self::set_data($ld);
		rtn::okk('', $ld);
	}		

	//提交题到下一步
	public function __ajx_tiSbt()
	{
		//参数处理
		if(!isset($_GET['sn'],$_GET['grp'],$_GET['val'])) rtn::err('参数缺失');
		//取回本地数据
		$ld=self::get_data();
		//改值
		if( !isset($ld[$_GET['grp']]) ) $ld[$_GET['grp']]=[];
		$ld[$_GET['grp']][$_GET['sn']]=$_GET['val'];

		//重新设定本地数据
		self::set_data($ld);
		rtn::okk();
	}		

	
}




