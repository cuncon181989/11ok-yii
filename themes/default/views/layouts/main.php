<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="cn_zh">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="language" content="cn_zh" />
<title><?php echo $this->pageTitle; ?> | <?php echo Yii::app()->name; ?></title>
</head>
<body>
<div id="webmap" align="center">
<div id="webHeader" align="left">
        <div id="headerTitle" class="FloatLeft">欢迎来到<?php echo $this->_user['realname']; ?>的<img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/ie.gif" />家</div>
        <div id="logo" class="FloatRight">
                <?php echo CHtml::link(CHtml::image(Yii::app()->theme->baseUrl.'/images/logo.gif'), '#', array('id'=>'button')); ?>
        </div>
        <div id="siteMenu" class="style1" style="display:none;">
                <ul>
                        <li><?php echo CHtml::link('11ok首页', '/'); ?></li>
                        <?php if(!Yii::app()->user->isGuest): ?>
                        <li><?php echo CHtml::link('我的主页', array('blog/index','username'=>Yii::app()->user->name)); ?></li>
                        <li><?php echo CHtml::link('退出登录', '/site/logout'); ?></li>
                        <li><?php echo CHtml::link('修改资料', array('users/update','username'=>Yii::app()->user->name)); ?></li>
                        <li><?php echo CHtml::link('修改头像', array('users/avatar','username'=>Yii::app()->user->name)); ?></li>
                        <li><?php echo CHtml::link('更换皮肤', array('blogs/setTheme','username'=>Yii::app()->user->name)); ?></li>
                        <li><?php echo CHtml::link('文章分类', array('articlesCategories/admin','username'=>Yii::app()->user->name)); ?></li>
                        <li><?php echo CHtml::link('管理文章', array('articles/admin','username'=>Yii::app()->user->name)); ?></li>
                        <li><?php echo CHtml::link('写新文章', array('articles/create','username'=>Yii::app()->user->name)); ?></li>
                        <li><?php echo CHtml::link('相册分类', array('galleryAlbums/admin','username'=>Yii::app()->user->name)); ?></li>
                        <li><?php echo CHtml::link('照片管理', array('gallery/admin','username'=>Yii::app()->user->name)); ?></li>
                        <li><?php echo CHtml::link('上传照片', array('gallery/upload','username'=>Yii::app()->user->name)); ?></li>
                        <?php else: ?>
                        <li>&nbsp;</li>
                        <li><?php echo CHtml::link('会员登录', array('site/login')); ?></li>
                        <?php endif ?>
                </ul>
        <div class="clr"></div>   
        </div>
        <?php Yii::app()->clientScript->registerCoreScript('jquery'); ?>
        <?php Yii::app()->clientScript->registerScriptfile(Yii::app()->getRequest()->baseUrl.'/js/jquery.DMenu.js'); ?>
        <?php Yii::app()->clientScript->registerScript('siteMenu','$(function(){$("#button").DMenu("#siteMenu");});'); ?>
    <div class="clr"></div>
</div>
<div id="weball" align="left">
	<div id="webMenu">
                <div id="menu"><?php echo CHtml::link('我的主页', array('blog/index','username'=>$this->_user['username'])); ?>|
                        <?php echo CHtml::link('我的文章', array('blog/articles','username'=>$this->_user['username'])); ?>|
                        <?php echo CHtml::link('我的相册', array('blog/galleryAlbums','username'=>$this->_user['username'])); ?>|
                        <?php echo CHtml::link('我的留言', array('blog/guestbook','username'=>$this->_user['username'])); ?></div>
        </div>
        <?php echo $content; ?>
        <div id="webUnder">CopyRight © <a href="http://www.11ok.net">11ok.net</a> 2010-<?php echo date('Y',time())+10?></div>
</div>
</div>
</body>
</html>
