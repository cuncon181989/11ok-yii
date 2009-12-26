<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="cn_zh">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="language" content="cn_zh" />
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/yellow.css" />
<title><?php echo $this->pageTitle; ?></title>
</head>
<body>
<div id="webmap" align="center">
<div id="webHeader" align="left">
        <div id="headerTitle" class="FloatLeft">欢迎来到<?php echo $this->_user['realname']; ?>的<img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/ie.gif" />家</div>
    <div id="logo" class="FloatRight"><a href="http://www.11ok.net" target="_blank"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/logo.gif" /></a></div>
    <div class="clr"></div>
</div>
<div id="weball" align="left">
	<div id="webMenu">
                <div id="menu"><?php echo CHtml::link('我的主页', array('blog/index','username'=>$this->_user['username'])); ?>|
                        <?php echo CHtml::link('我的日记', array('blog/articles','username'=>$this->_user['username'])); ?>|
                        <?php echo CHtml::link('我的相册', array('blog/galleryAlbums','username'=>$this->_user['username'])); ?>|
                        <?php echo CHtml::link('我的留言', array('blog/guestbook','username'=>$this->_user['username'])); ?></div>
        </div>
        <?php echo $content; ?>
        <div id="webUnder">CopyRight © 11ok.net 2009-2019 MEM:<?php echo number_format(memory_get_usage()). ' (peak): '. number_format(memory_get_peak_usage()); ?></div>
</div>
</div>
</body>
</html>
