<?php
header("Content-type: text/html; charset=utf-8");
//exit('okk');
/*
echo base64_encode('{"dns":"mysql:host=localhost;port=3306;dbname=yuanxian","usr":"xyz","pwd":"123456"}');
exit;


$a='eyJkbnMiOiJteXNxbDpob3N0PWxvY2FsaG9zdDtwb3J0PTMzMDY7ZGJuYW1lPXl1YW54aWFuIiwidXNyIjoicm9vdCIsInB3ZCI6IjEyMzQ1NiJ9';

echo base64_decode($a);
exit;
*/

//载入 框架基础配置
require './sys/core/conf.php';
//载入 项目配置
require FR_APP.APP_NAME.'/self.conf.php';

//引入框架助理
require FR_SYS.'core/assistant.php';

//载入核心
core\vit::exc();
