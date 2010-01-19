<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="cn_zh">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="language" content="cn_zh" />
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/base.css" />
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/<?php echo $this->_blog->settings['theme']['style']; ?>" />
<title><?php echo $this->pageTitle; ?> | <?php echo Yii::app()->name; ?></title>
</head>
<body>
<div id="webmap" align="center">
<div id="webHeader" align="left">
        <div id="headerTitle" class="FloatLeft">欢迎来到<?php echo $this->_user['realname']; ?>的<img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/ie.gif" />家</div>
        <div id="logo" class="FloatRight"><a href="<?php echo Yii::app()->getRequest()->baseUrl.'/'; ?>"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/logo.gif" /></a></div>
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
        <div id="webUnder">CopyRight © 11ok.net 2009-2019 MEM:<?php echo round(memory_get_usage()/1024/1024,4). 'M (peak): '. round(memory_get_peak_usage()/1024/1024,4); ?></div>
</div>
</div>
</body>
</html>
