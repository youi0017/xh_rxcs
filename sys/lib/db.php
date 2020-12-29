<?php namespace lib;
/**
 * 数据库接口类
 * chy
 * 20180403
 * lm:20180411 加入错误处理
 */
class db
{
	private $pdo,$_errMsg='';

	
	private static $meer;
	public static function meer()
	{
		if(!isset(self::$meer)) self::$meer=new self;
		return self::$meer;
	}
		

	//数据库接口初始化操作
	public function __construct()
	{
		try
		{
			//完成数据库的连接
			$dsn = 'mysql:host=localhost;port=3306;dbname=data1;';
			$user = 'root';
			$password = '';

			//1.2 连接数据库
			$this->pdo = new \PDO($dsn,$user,$password);
			//设置捕获异常,PDOException错误类型
			$this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
			//设置禁止本地模拟prepare
			$this->pdo->setAttribute(\PDO::ATTR_EMULATE_PREPARES, false);
			$this->pdo->exec('SET NAMES utf8');
		}
		catch(\PDOException $e)
		{
			//$this->set_err($e);
			\lib\rtn::mep($e->getMessage());
		}
	}

	//执行[查询]并返回结果
	/*
	[3=>10, 16, 5]
	['usrname'=>'xiaoming', age=>16, id=>12456]

	*/
	public function get_result($sql, $dArr=[])
	{
		//返回sth对象
		$sth=$this->get_sth($sql, $dArr);
		return $sth ? $sth->fetchAll(\PDO::FETCH_ASSOC) : false;
		//$r=$sth->fetchAll(\PDO::FETCH_ASSOC);
		//return $r;
		//var_dump($r);	
	}

	//执行[增添、删除、修改]，并返回影响行数
	public function get_excNmb($sql, $dArr=[])
	{
		//返回sth对象
		$sth=$this->get_sth($sql, $dArr);
		return $sth ? $sth->rowCount() : false;
		
		//$r=$sth->rowCount();
		//return $r;
		//var_dump($r);		
	}


	//增、删、改、查 都是使用prepare预处理sql语句，并完成参数绑定，并返回PDOStatement
	private function get_sth($sql, $dArr)
	{
		try
		{
			//1. 预执行SQL语句
			$sth=$this->pdo->prepare($sql);

			//2. 绑定参数
			//取回数据类型
			$keys=array_keys($dArr);
			$isAso=is_string( end($keys) );

			if($isAso)
			{
				foreach( $dArr as $key=>$val )
				{
					$sth->bindValue(':'.$key, $val, \PDO::PARAM_STR);
				}
			
			}
			else
			{
				for($i=0; $i<count($dArr); $i++)
				{
					$sth->bindValue($i+1, $dArr[$i], \PDO::PARAM_STR);
				}
				
			}

			//3 执行处理语句 
			$sth->execute();

			return $sth;
		}
		catch(\PDOException $e) 
		{
			\lib\rtn::mep($e->getMessage());
			//$this->set_err($e);
			//return false;
		} 
			
	}

	//取得错误 20170725
	private function set_err($e)
	{
		//var_dump($e);
		$this->_errMsg=$e->getMessage();
		\lib\tools::note_err($this->_errMsg, __FILE__);
	}

	private function _is_err(){ return $this->_errMsg!==''; }


	//取得错误
	public function get_err(){ return $this->_errMsg;}



	
}


/*
//静态方式实例化类的调用
db::meer()->get_result();


//返回查询结果的
$db=new db();
$db->get_result('select * from t_xhuser where id>:min and id<:max;', ['min'=>100, 'max'=>130]);
*/

/*
//更改数据，返回影响行数的
$db=new db();
$db->get_excNmb('update t_xhuser set age=age+1 where id>? and id<?;', [50, 100]);
*/

