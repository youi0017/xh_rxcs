<?php
/**
* 项目配置
* 20170726
*/
//APP控制器目录
const APP_CTL = 'ctl';
//APP模版目录
const APP_TPL = 'tpl';
//APP用户控制
const APP_USR = 'usrs';

//APP管理控制//const APP_ADM = 'adm';
const APP_NAME_ZH='新生入学测试系统';

//错误(显示)控制 {开发:1 用户:0}
const ERR_ON = 1;
//错误(日志)控制 {关闭:0 开启:1}
const LOG_ON = 1;
//定义存储日志(错误)文件的位置
define('ERROR_LOG_FILE', FR.APP_NAME.'/log/err_'.date('Ymd').'.txt');


//数据库配置信息
const DNS_DB='mysql:host=127.0.0.1;port=3306;dbname=data1';
const USR_DB='xyz';
const PWD_DB='123456';
