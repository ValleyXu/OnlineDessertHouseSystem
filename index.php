<?php
$ds = DIRECTORY_SEPARATOR;
// change the following paths if necessary
$yii=dirname(__FILE__).$ds.'assets'.$ds.'framework/yii.php';
$config=dirname(__FILE__).'/protected/config/main.php';

 // remove the following lines when in production mode
defined('YII_DEBUG') or define('YII_DEBUG',true);
// specify how many levels of call stack should be shown in each log message
defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL',3);

require_once($yii);
Yii::createWebApplication($config)->run();

/* $auth=Yii::app()->authManager;

$auth->createOperation('createPost','create a post');
$auth->createOperation('view', "view all");

$bizRule = 'return $params["identity"] == ' . User::$MENBER . ';';
$role=$auth->createRole('menber', 'menber ship', $bizRule);

$bizRule = "return Yii::app()->user->isGuest";
$role=$auth->createRole('guest', 'guest user', $bizRule);
$role->addChild("view");

$bizRule = 'return $params["identity"] == ' . User::$ADMIN . ";";
$role=$auth->createRole('admin', 'administer', $bizRule);
$role->addChild('createPost');  */

// $auth->assign('admin','1'); 