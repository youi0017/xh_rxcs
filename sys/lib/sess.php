<?php  namespace lib;

/**
 * 字符串的转码
 * @author chy
 * 20160503
 *
 	示例：
	echo crypts::encrypt('you are welcome');
	echo '<br/>';
	echo crypts::decrypt('eJyrzC9VSCxKVShPzUnOz00FAC2oBcI=');
 * 
 */


class sess
{

//** SESSION ************************

	public static function _start()
	{
		if(!isset($_SESSION)) session_start();
	}

	/* 取得ID */
	public static function sid()
	{
		self::_start();
		return session_id();
	}

	/* 设置一个，或删除一个 */
	public static function sset($k, $v=null)
	{
		self::_start();
		$_SESSION[$k] = $v;
		session_write_close();
		return $v;
	}

	/* 取得一个 */
	public static function sget($k)
	{
		self::_start();
		return isset($_SESSION[$k]) ? $_SESSION[$k] : null;
		session_write_close();
	}

	/* 清除 所有 */
	public static function sdel()
	{
		self::_start();
		//echo session_id();
		//session_unset();
		//var_dump($_SESSION);
		session_destroy();
	}




/** 临时会话控制 **/
	/** 
	 * 临时会话: 验证(并销毁)令牌 20170206
	 * @param tknName token名称
	 * @param tknVal 待验证的token值
	   示例：
	   取得或生成tkn $val=sess::set_tkn(xxx::tknName);
	   验证并删除tkn sess::valid_tkn(xxx::tknName, $val);
	 * 
	 */
	public static function qc_tkn($tknName, $tknVal)
	{
		$_tknVal=self::cget($tknName);
		if($_tknVal && $_tknVal==$tknVal)
		{
			//销毁
			self::cdel($tknName);
			return true;
		}
		return false;
	}
	
	/** 临时会话: 令牌生成 20161029 */
	public static function set_tkn($tknName, $tknVal='')
	{
		$tknVal = $tknVal!=='' ? $tknVal : time()/2;
		return self::cset($tknName, $tknVal);
	}



	


//** COOKIE ************************
	/* 设置一个 */
	public static function cset($k, $v, $second=3600, $catalog='/')
	{
		$second = time()+$second;
		setcookie($k, $v, $second, $catalog);
		return $v;
	}
	
	/* 取得一个 */
	public static function cget($k)
	{
		return isset($_COOKIE[$k]) ? $_COOKIE[$k] : null;
	}

	/*删除一个*/
	public static function cdel($k)
	{
		$b=false;
		if(is_array($k))
		{
			foreach($k as $_k)
			{
				$b=setcookie($_k, null, time()-3600, '/');
			}
		}
		else if(is_string($k))
			$b=setcookie($k, null, time()-3600, '/');
		
		return $b;
	}


	

	

	

}
