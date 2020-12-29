<?php namespace ctl;
use lib\assign;
use lib\rtn;

class cs extends \clib\ctl
{

	public function dft()
	{
		$arr=[111, 222,];
		$arr['1']=333;

		var_dump($arr);

		exit;

		
		$a = array("a" => "apple", "b" => "banana");
		$b = array("a" => "pear", "b" => "strawberry", "c" => "cherry");

		$c = $a + $b; // Union of $a and $b
		echo "Union of \$a and \$b: \n";
		var_dump($c);exit;

		
		$str='1,2,3.5,6';
		$bbb=explode(',', $str);
		

		var_dump( implode('-', $bbb) );

		var_dump( (array)45689  );exit;

		
		$arr=['aa'=>'af4565'];
		var_dump($arr{'aa'});exit;

		$a=0;
		switch ( $a )
		{
			case $a>100:
				echo '100+';
				break;		
			case $a>=10:
				echo '10+';
				break;		
			default:
				echo '1+';
				break;
		}

		//星期
		//数段
		

		
	}

	
}




