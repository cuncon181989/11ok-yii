<?php

// change the following paths if necessary
require(dirname(__FILE__).'/protected/config/globalFuntions.php');
$yii=dirname(__FILE__).'/framework/yii.php';
$config=dirname(__FILE__).'/protected/config/main.php';

// remove the following line when in production mode
defined('YII_DEBUG') or define('YII_DEBUG',true);

//加上错误报告级别
(YII_DEBUG)? error_reporting(E_ALL ^E_NOTICE): error_reporting(0);

require_once($yii);
Yii::createWebApplication($config)->run();
