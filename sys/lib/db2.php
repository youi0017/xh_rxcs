<?php namespace lib;

/**
 * DB接口处理库：v2版
 * -20161230 V1版
 * -今 V2版
 * LM: 20180121 更新T方法
 */
class db2
{
	private static $_dber;//mysql数据库对象实例
	private $pdo;
	private $_errMsg='';
	private $lastId;

	public static function meer()
	{
		if( !isset(self::$_dber) ) self::$_dber = new self;
		return self::$_dber;
	}


	/**/
	public function __construct($db_sqlite=false)
	{
		try
		{
			//if($db_sqlite && is_file($db_sqlite))
			//	$this->pdo = new \PDO('sqlite:'.$db_sqlite);
			
			if(!defined('SQLCNF')) throw new \PDOException('未配置数据库');
			$cf=json_decode(base64_decode(SQLCNF));
			$this->pdo = new \PDO($cf->dns,$cf->usr,$cf->pwd); 
			
			//设置捕获异常,PDOException错误类型
			$this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
			//设置禁止本地模拟prepare
			$this->pdo->setAttribute(\PDO::ATTR_EMULATE_PREPARES, false);

			$this->pdo->exec('SET NAMES utf8');//默认字符
			//$this->pdo->exec(date_default_timezone_set('Asia/Shanghai'));//如时区正确则不用开启
		}
		catch(\PDOException $e)
		{
			$this->_errMsg=$e->getMessage();
			$this->set_err($e);
		}
	}

	/**
	 * 执行DELETE、 INSERT、或 UPDATE 语句(返回受影响的行数)
	 * 
	 * 20170517
	 */
	public function exc($sql, array $parmArr=[])
	{
		if($this->_is_err()) return false;

		//var_dump($sql);
		//执行句语
		$sth = $this->_sth($sql, $parmArr);
		//var_dump($sth);exit;
		//取出影响行数
		return $this->_is_err() ? false : $sth->rowCount();
	}

	
	/**
	 * Read：执行"查询"语句
	 * @parm fetchAll bool true:全部数据；false:只取第一组数据
	 * @return ok:二维数组，err:false
	 * 说明：
	   如果SQL语句中没有指明取出条数据，则最多取出30条
	 * 
	 * 20170517
	 */
	public function R($sql, array $parmArr=[], $fetchAll=true, $rType='object')
	{
		if($this->_is_err()) return false;

		if(stripos($sql, 'limit')===false) $sql .= ' limit 0,300';
		//执行句语
		$sth=$this->_sth($sql, $parmArr);
		//取出结果
		$fetchAll = $fetchAll ? 'fetchAll' : 'fetch';

		return $this->_is_err() ? false : $sth->$fetchAll( $this->get_rtnType($rType) );
	}

	/**
	 * 设置结果类型
	 * 20170715
	 */
	private function get_rtnType($rType='object')
	{
		switch($rType)
		{
			case 'object': return \PDO::FETCH_OBJ;
			case 'array': return \PDO::FETCH_ASSOC;
			case 'both': return \PDO::FETCH_BOTH;
			default: return \PDO::FETCH_OBJ;
		}
	}

	
	/*
	 * Delete：执行以主键为索引的"删除"语句 
	 * 说明：
	 	@param $t_d_k array 表名_数据_关键字, 如['t'=>'t_ceshi_0','d'=>'1001,1008,1223','k'=>'id']
		@return false|int ok:删除条数, err:false
	 * 
	 * 注意：在pdo的prepare中 "id in (:id)" 中:id不能替换为'12,13,16'类值 
	 * 
	 * 示例：
	 	$c = \lib\db2::meer()->D('t_svy_cs', '61,64', 'id');
		var_dump($c);
	 *   
	 * 20170517
	 */
	public function D($tbl, $ids, $k='id')
	{
		if($this->_is_err()) return false;

		if(is_array($ids)) $ids=implode(',', $ids);
		$sql = 'DELETE FROM '.$tbl.' WHERE '.$k.' IN ('.$ids.')';
		return $this->exc($sql);
	}

	/**
	 * 插入或更新操作(自动判断)
	 * 20170520
	 */
	public function IU($tbl, array $row, $pk=null)
	{
		if($this->_is_err()) return false;

		//设置了，但实际值是假，则将其删除
		if(isset($row[$pk]) && empty($row[$pk])) unset($row[$pk]);
		return isset($row[$pk]) ? $this->U($tbl, $row, $pk) : $this->I($tbl, $row);

		//var_dump($pk);exit;
		//return $pk ? $this->U($tbl, $arr, $pk) : $this->I($tbl, $arr);
	}
	
	/**
	 * 单条写入
	 * @parm tbl string 表名
	 * @parm arr array 必需为关联数组
	 * @parm replace bool 是否有主重复主键时，更新插入 20170602更新加入
	 * 
	 * 示例
	 	$arr =['usr'=>'u001', 'tit'=>'t1', 'dsb'=>'dsb1111'];
		$b = \lib\db2::meer()->I('t_cs', $arr);
		var_dump($b);
		var_dump(\lib\db2::meer()->last_id());
	 * 
	 * 20170519
	 */
	public function I($tbl, array $arr, $replace=false)
	{
		if($this->_is_err()) return false;

		$replace=$replace?'replace':'insert';
		//1. 组成sql语句
	 	//insert into `tbl` set `aa`=:aa,`bb`=:bb;
		//insert into `tbl` (`aa`,`bb`) values (:aa, :bb)
		$sql =$replace.' into '.$tbl.' set ';//`aa`=:aa,`bb`=:bb
		$sql_2 ='';
		foreach( $arr as $k => $v ){$sql_2 .=",`$k`=:$k ";}
		$sql .= substr($sql_2, 1);
		//var_dump($sql);exit;

		//3. 执行句语
		$this->_sth($sql, $arr);
		//var_dump($this->_is_err());
		
		//4. 取得最后插入数据的ID, 如查ID不是自增，将不能取得lastInsertId 20161117
		$this->lastId = $this->pdo->lastInsertId();
		
		//5. 返回处理结果
		return $this->_is_err() ? false : true;
	}


	/**
	 * 单条更新
	 * @param tbl 表名
	 * @parm arr 必需为关联数组
	 * @return false|nmb 错误，或影响行数
	 * 示例
	 	$arr =['tit'=>'t', 'dsb'=>'dsb' ,'id'=>'49'];
	 	$b = \lib\db2::meer()->U('t_cs', $arr, 'id');
		var_dump($b);
	 * 
	 * 20170520
	 */
	public function U($tbl, array $arr, $pk)
	{
		if($this->_is_err()) return false;

		//1.没有pk的不可执行
		if(!$pk || !isset($arr[$pk]))
		{
			$this->_errMsg='ERR: U()方法PK错误！';
			 return false;
		}

		//2. 组成sql语句
		//update `tbl` set `aa`=:aa,`bb`=:bb  where `xx`=:xx;		
		$sql ='update '.$tbl.' set ';
		$sql_2 ='';
		$whr ='';
		foreach( $arr as $k => $v )
		{
			if($k==$pk){$whr =" where `$k`=:$k";continue;}
			else $sql_2 .=",`$k`=:$k ";
		}
		$sql .= substr($sql_2, 1).$whr;
		//var_dump($sql);//var_dump($arr);exit;
		
		//3. 执行句语
		$sth = $this->_sth($sql, $arr);
		//4. 返回处理结果
		return $this->_is_err() ? false : $sth->rowCount();
	}




	/*
	 * 事务C-U：[写入]或[更新]多条数据
	 * 
	 * @param tbl 表名
	 * @param arr 待写入数据库的二维数组
	 * @param pk 数据对应的主键值，一般为ID
	 * @param replace 插入时，启用替代模式 20171025加入
	 * @return bool true|false
	 * 
	 * 注意：20161121
	 	1. $pk==null，执行插入操作，且$pk必需为自增字段，否则SQL报错
	 	2. $pk建议填写：当$arr[$pk]判定为真则执行更新；当判定假不存在时为新增(且会为$arr[$pk]设定一个当前的时间戳作为$pk的值)
	 * 
	 * 示例：
	 	$arr =[
			['usr'=>'u001', 'sex'=>'nan', 'age'=>16]
			,['usr'=>'u002', 'sex'=>'nv', 'age'=>21]
		];
		$b = \lib\db2::meer()->T('t_cs', $arr);
		var_dump($b);
		var_dump(\lib\db2::meer()->last_id());
	 * 
	 * 20170519 chy
	 * lm: 20180121 对单条处理时的$b判断由"!$b"改为"$b===false",以修正U任一条数据没有更改时反回0而被报错
	*/
	public function T($tbl, array $arr, $pk=null, $replace=false)
	{
		if($this->_is_err()) return false;

		try
		{
			//1. 开启标准事务
			$this->pdo->beginTransaction();

			//2. 执行数据处理
			foreach($arr as $row)
			{
				//调用单条处理(注：对U方法，有一条没有更新也返回失败20180121)
				$b = ($pk && isset($row[$pk])) ? $this->U($tbl, $row, $pk) : $this->I($tbl, $row, $replace);
				//出错则抛出错误
				if($b===false) throw new \PDOException();
			}

			//3. 提交事务
			$this->pdo->commit();
			return true;
		}
		catch(\PDOException $e) 
		{
			//3. 回滚事务
			$this->pdo->rollBack();
			$this->set_err($e);
			return false;
		}
	}

	/**
	 * 取得(条件下)数据总条数
	 * 
	 * 示例
	 * 	$c = \lib\db2::meer()->get_count('select count(id) from `t_cs` where `id`=? and usr=?', [6, 'u1001']);
	 * var_dump($c);
	 * 20170519

	 */
	public function get_count($sql, array $arr=[])
	{
		if($this->_is_err()) return false;

		$sth=$this->_sth($sql, $arr);
		return $this->_is_err() ? false : $sth->fetchColumn();
	}
	

	/**
	 * P/page分页查询
	 * 
	 * @param $sql string sql查询语句（注意：不含limit）
	 * @param $parmArr array sql语句中代替值
	 * @param $_datagrid bool 以datagrid格式输出
	 * //@param $_base sql语句中代替值
	 * @param $_sn  查询显示条数
	 * @param $_pn  查询显示页数
	 
	 * @param $_datagrid bool true|false 以datagrid格式返回数据
	 * 变量说明：
		$rtn 结果数组
		$_GET['pn'] 当前页码数
		$_GET['sn'] 页显示条数
		$rtn['total'] datagrid时，数据总条数；非datagrid时，总页数
		$pn_total 总页数（非datagrid时，与$rtn['total']一样）
		$rtn['inf'] 分页信息
		$rtn['btn'] 分页按钮
	 *
	 * @return array
	 	[
	 		'total'=> 5
	 		, 'rows'=>[
	 			0=>['id'=>'3', 'name'=>'aaa', 'title'=>'this title']
	 			, ...
	 		]

	 		//以下数据，当datagrid==false时会输出
	 		, 'pn'=> 3
	 		, 'inf'=> '第 3 页 / 共 5 页'
	 		, 'btn'=> '<a href=/adm-news.html?sn=1&pn=1>首页</a> <a href=/adm-news.html?sn=1&pn=1>上页</a> <a href=javascript:void(0)>下页</a> <a href=javascript:void(0)>末页</a>'
	 	]
	 * 
	 * 示例
	 	$r = \lib\db2::meer()->P('select usr,tit,dsb from t_svy_cs where `id`>:id ', ['id'=>'49'], false, 2 ,1);
	 	var_dump($r);
	 * 
	 * 注：$rtn['total'] = datagrid==true ?总记录条数 : 总页数
	 * 
	 * 20160613 LM:20180118 修正有排序时total条数不正确
	 * 
	 */
	public function P($sql, array $parmArr=[], $_datagrid=false, $_sn=8, $_pn=1)
	{
		if($this->_is_err()) return false;

		$rtn = [];
		//1. 校正显示条数
		if(isset($_GET['sn']) && $_GET['sn']>0 && $_GET['sn']<1000) $_sn=$_GET['sn'];
		/*
		//2. 计算总条数
		//$_sql = preg_replace('/select (.*) from/i', 'select count(*) from', $sql);
		$_sql = preg_replace('|^select .*? from|i', 'select count(*) from', $sql);
		//var_dump($_sql);
		$rtn['total']=$this->get_count($_sql, $parmArr);
		*/
		
		//2. 计算总条数
		$_sql = preg_replace('|^select .*? from|i', 'select count(*) as c from', $sql);
		//$_sql='select count(t.c) from ('.$_sql.') t';
		$_sql='select t.c from ('.$_sql.') t';
		//var_dump($_sql);exit;
		$rtn['total']=$this->get_count($_sql, $parmArr);
		//var_dump($rtn['total']);exit;
		
		$pn_total = ceil( $rtn['total'] / $_sn );
		//3. 校正当前页码
		if(isset($_GET['pn']) && $_GET['pn']>1) $_pn=floor($_GET['pn']);
		if($_pn>$pn_total) $_pn=$pn_total;
		if($_pn<1) $_pn=1;
		//4. sql语句截取
		$sql .= ' LIMIT '.( ($_pn-1) * $_sn ).','.$_sn;
		//var_dump($sql);//exit;
		
		//5. 查询结果
		$rtn['rows'] = $this->R($sql, $parmArr);

		//6. 非DG数据，则返回页码信息
		if(!$_datagrid)
		{
			$rtn['pn'] = $_pn;
			$rtn['total'] = $pn_total;

			//7. 分页信息
			$rtn['inf'] = '第 '.$_pn.' 页 / 共 '.$rtn['total'].' 页';
			
			//8. 页码按钮
			$rtn['btn']='';
			$url_no_pn = $this->_get_url_nopgnmb();
			$p1=$p2=$p3=$p4='javascript:void(0)';/*首+上+下+末*/
			$cls1=$cls2='t_d';/*首+上+下+末*/

			if($_pn>1)
			{
				$p1 = $url_no_pn.'1';
				$p2 = $url_no_pn.($_pn-1);
				$cls1='';
			}

			if($_pn<$rtn['total'])
			{
				$p4 = $url_no_pn.$rtn['total'];
				$p3 = $url_no_pn.($_pn+1);
				$cls2='';
			}


			if($cls1=='')
			{
				$rtn['btn'].='<a target="_self" href='.$p1.'>首页</a> <a target="_self" href='.$p2.'>上页</a>';
			}

			if($cls2=='')
			{
				$rtn['btn'].=' <a target="_self" href='.$p3.'>下页</a> <a target="_self" href='.$p4.'>末页</a>';
			}
			
			//$rtn['btn'] = '<a target="_self" class="'.$cls1.'" href='.$p1.'>首页</a> <a target="_self" class="'.$cls1.'" href='.$p2.'>上页</a> <a target="_self" class="'.$cls2.'" href='.$p3.'>下页</a> <a target="_self" class="'.$cls2.'" href='.$p4.'>末页</a>';
		}

		//9. 返回结果
		//var_dump($rtn);exit;
		return $rtn;
	}

	
	/**
	 * 预置sql语句
	 * 说明：发送语句构架并绑定sql参数，返回 PDOStatement对象
	 * @parm sql 待执行sql语句 
	 * @parm parmArr 待绑定的参数数组
	 * 
	 * 示例一：
		$sql='SELECT name, colour, calories FROM fruit WHERE calories < :calories AND colour = :colour';
		$parmArr=['calories'=>150, 'colour'=>'red'];
	 * 示例二：
		$sql='SELECT name, colour, calories FROM fruit WHERE calories < ? AND colour = ?';
		$parmArr=[150,'red'];
	 * 
	 * 20170517
	 */
	public function _sth($sql, array $parmArr)
	{
		if($this->_is_err()) return false;

		try
		{
			//var_dump($sql);var_dump($parmArr);exit;
			//发送语句构架
			$sth = $this->pdo->prepare($sql);
			//var_dump($sth);//exit;
			$b = isset($parmArr[0]);
			//var_dump($b);exit;
			//注："&$v"为诡异错误 同citc
			foreach($parmArr as $k =>$v)
			{
				//判断值的类型：20170517设定只有类型 数字 或 文本
				$parmType= is_numeric($v) ? \PDO::PARAM_INT : \PDO::PARAM_STR;
				//占位符的替换："?"时为数字索引, ":name"时为关联数组
				$k = $b ? $k+1 : ':'.$k; 
				//绑定参数
				//var_dump($k.' '.$v);
				//$sth->bindParam($k, $v, $parmType);
				$sth->bindValue($k, $v, $parmType);
			}

			//发送数据，执行语句
			$sth->execute();

			//捕获错误
			//$this->_errMsg='';
			//if($sth->errorCode()!=='00000') $this->_errMsg=$sth->errorInfo()[2];
			
			return $sth;

		}
		catch(\PDOException $e) 
		{
			//$this->_errMsg=$e->getMessage();
			$this->set_err($e);
			return false;
		} 

	}


	/*
	 * 取得用于 合成 不含页码的url
	 * 独立方法，不依赖其它
	 * 20160401
	 * lm: 20170221 取出原url时出错，改为server取得
	*/
	private function _get_url_nopgnmb()
	{
		//var_dump($_SERVER['REQUEST_URI']);var_dump($_GET);
		$_GET['pn']='';
		//$_base = $_base!='' ? $_base : explode('?',$_SERVER['REQUEST_URI'])[0];
		$base = explode('?',$_SERVER['REQUEST_URI'])[0];
		//var_dump($base[0].'?'.http_build_query($_GET));exit;
		return $base.'?'.http_build_query($_GET);
	}

	
	/**
	 * 取回最后插入的ID
	 * 注：get_lastInsertId 更改为 last_id
	 * 20170517
	 */
	public function last_id(){return $this->lastId;}



	/**
	 * 错误控制方法:在PDO语后抓取SQL错误。
	 * 调用示例：if( $this->_is_err() ) return false;// $this->_is_err();//有错误时,返回真，$this->err_msg存储错误信息!
	 * 
	 * 20160613
	 */
	private function _is_err(){ return $this->_errMsg!==''; }

	//取得错误 20170725
	private function set_err($e)
	{
		//var_dump($e);
		$this->_errMsg=$e->getMessage();
		tools::note_err($this->_errMsg, __FILE__);
	}
	
	//取得错误
	public function get_err(){ return $this->_errMsg;}



	function __destruct(){}

}