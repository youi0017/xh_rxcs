<?php namespace ctl;
use lib\assign;
use lib\rtn;


class index extends \clib\ctl
{
	public function cs()
	{

		$r = step::get_tjZy();
		var_dump($r);exit;

		
		//高频专业-->此处定义
		$most=['hz', 'cw', 'app'];
		$move=['zhcs'];
		
		shuffle($most);
		//var_dump($most);
		//除高频专业的其它专业
		$_oth= array_diff( array_keys(self::zys()), $most, $move);
		var_dump($_oth);
		$most[]=$_oth[rand(1, count($_oth))];//array_rand($_oth, 1)
		unset($most[0]);

		var_dump($most);
	}
	/**
	 * 判断是否是'手机访问'请求
	 * return [真]则为手机访问，[假]则为电脑访问
	 * 20170223
	 */
	public static function isMobile()
	{
		$_SERVER['ALL_HTTP'] = isset($_SERVER['ALL_HTTP']) ? $_SERVER['ALL_HTTP'] : '';
		$mobile_browser = '0';
		if( preg_match('/(up.browser|up.link|mmp|symbian|smartphone|midp|wap|phone|iphone|ipad|ipod|android|xoom)/i', strtolower($_SERVER['HTTP_USER_AGENT'])) ) $mobile_browser++;
		if((isset($_SERVER['HTTP_ACCEPT'])) and (strpos(strtolower($_SERVER['HTTP_ACCEPT']),'application/vnd.wap.xhtml+xml') !== false)) $mobile_browser++;
		if(isset($_SERVER['HTTP_X_WAP_PROFILE'])) $mobile_browser++;
		if(isset($_SERVER['HTTP_PROFILE'])) $mobile_browser++;
		$mobile_ua = strtolower(substr($_SERVER['HTTP_USER_AGENT'],0,4));
		$mobile_agents = array(  
			'w3c ','acs-','alav','alca','amoi','audi','avan','benq','bird','blac',  
			'blaz','brew','cell','cldc','cmd-','dang','doco','eric','hipt','inno',  
			'ipaq','java','jigs','kddi','keji','leno','lg-c','lg-d','lg-g','lge-',  
			'maui','maxo','midp','mits','mmef','mobi','mot-','moto','mwbp','nec-',  
			'newt','noki','oper','palm','pana','pant','phil','play','port','prox',  
			'qwap','sage','sams','sany','sch-','sec-','send','seri','sgh-','shar',  
			'sie-','siem','smal','smar','sony','sph-','symb','t-mo','teli','tim-',  
			'tosh','tsm-','upg1','upsi','vk-v','voda','wap-','wapa','wapi','wapp',  
			'wapr','webc','winw','winw','xda','xda-');
	 	if(in_array($mobile_ua, $mobile_agents)) $mobile_browser++;
		  
		if(strpos(strtolower($_SERVER['ALL_HTTP']), 'operamini') !== false) $mobile_browser++;
		
		// Pre-final check to reset everything if the user is on Windows  
		if(strpos(strtolower($_SERVER['HTTP_USER_AGENT']), 'windows') !== false) $mobile_browser=0;
		
		// But WP7 is also Windows, with a slightly different characteristic  
		if(strpos(strtolower($_SERVER['HTTP_USER_AGENT']), 'windows phone') !== false) $mobile_browser++;
		 
		//if($mobile_browser>0) return true;else return false;
		return $mobile_browser>0;
	}

	/**
	 * 自动转向到电脑或手机页面
	 * 20181009
	 */
	public static function auto()
	{
		$bool = self::isMobile();
		//var_dump($bool);exit;
		//if($bool)
			

		
		
	}


	
	
	//专业配置 
	public static function zys($kname='')
	{
		$zys=[
			'zhcs'=>'综合测试'
			,'ysdm'=>'VR影视动漫设计师'//VR影视动漫游戏开发+
			,'ui'=>'UI视觉设计师'//新媒体UI创意设计师+
			,'kjcy'=>'VR空间创意设计师'//+
			,'rgzn'=>'人工智能'//+
			,'dsj'=>'大数据应用工程师'//+
			,'web'=>'网站开发工程师'//互联网平台开发工程师+
			,'yun'=>'5G网络信息安全工程师'//网络信息安全工程师\云计算网络工程师+
			,'dzjj'=>'电子竞技运动与管理'//电子竞技运管精英+
			,'yds'=>'电子商务工程师'//云电子商务运营+
			,'dsp'=>'短视频与新媒体运营'//2020
			,'wrj'=>'无人机应用工程师'//2020
			,'yxkf'=>'游戏开发与运营'//2020
			,'yycy'=>'互联网运营与创业'//2020
			,'jzzs'=>'建筑装饰创意设计师'//2020
			//,'app'=>'移动APP软件开发工程师'
			//,'cw'=>'互联网财务管理'			
			// ,'hz'=>'会展设计策划与管理'//互联网+会展
		];

		

		return isset($zys[$kname]) ? $zys[$kname] : ($kname=='' ? $zys : rtn::mep('专业不存在！'));
	}

	//返回专业json 2018年9月28日 星期五
	public function ajx_getZY()
	{
		rtn::okk(count(self::zys()), self::zys());
	}
	
	public function dft()
	{
		//$tplIdx = self::isMobile() ? 'index_m' : 'index';
		$tplIdx = 'index';
		//var_dump($bool);exit;
		
		include assign::load($tplIdx);
	}
	
	public function dft_m()
	{
		//取回专业配置
		//$zys=self::zys();
		
		//echo '新生入学测试系统';
		include assign::load('index_m');
		exit;
	}

	
}




