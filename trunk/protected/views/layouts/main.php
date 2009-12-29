<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="language" content="en" />
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />
<title><?php echo $this->pageTitle; ?></title>
</head>

<body>
<div id="page">

<div id="header">
<div id="logo"><?php echo CHtml::encode(Yii::app()->name); ?> &nbsp;&nbsp; - &nbsp; <?php echo Yii::app()->user->name ?></div>
<div id="mainmenu">
<?php $this->widget('application.components.MainMenu',array(
	'items'=>array(
		array('label'=>'首页', 'url'=>array('/site/index')),
		array('label'=>'联系我们', 'url'=>array('/site/contact')),
		array('label'=>'文章', 'url'=>array('/articles/list')),
		array('label'=>'文章分类', 'url'=>array('/articlescategories/list'), 'visible'=>!Yii::app()->user->isGuest),
		array('label'=>'博客分类', 'url'=>array('/BlogCategories/list'), 'visible'=>!Yii::app()->user->isGuest),
		array('label'=>'博客管理', 'url'=>array('/blogs/list'), 'visible'=>!Yii::app()->user->isGuest),
		array('label'=>'登录', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
		array('label'=>'退出', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest),
		array('label'=>'注册', 'url'=>array('/users/register'), 'visible'=>Yii::app()->user->isGuest),
		array('label'=>'更新资料', 'url'=>array('/users/update'), 'visible'=>!Yii::app()->user->isGuest),
	),
)); ?>
</div><!-- mainmenu -->
</div><!-- header -->

<div id="content">
<?php echo $content; ?>
</div><!-- content -->

<div id="footer">
Copyright &copy; 2009 by 易翔商务.<br/>
All Rights Reserved.<br/>
<?php echo Yii::powered(); ?>
</div><!-- footer -->

</div><!-- page -->
</body>

</html>