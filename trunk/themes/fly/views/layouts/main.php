<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="cn_zh">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="language" content="cn_zh" />
<title><?php echo $this->pageTitle; ?> | <?php echo Yii::app()->name; ?></title>
</head>
<body>
<div id="top">
  <div id="menu">
  <ul><br>
  <li id="current"><?php echo CHtml::link('我的首页', array('blog/index','username'=>$this->_user['username'])); ?></li>
	<?php foreach ($this->_blog->getCustomLinks() as $key=>$link): ?>
		<li><?php echo CHtml::link($link[0], $link[1]);?></li>
		<?php if ($key==3) break; ?>
	<?php endforeach; ?>
  </ul>
  </div>
  <div id="banner"
	 <?php if ($this->_blog['settings']['headbg']['enabled']===true): ?>
	 style="background:url(<?php echo $this->_user->getUploadUrl().$this->_blog['settings']['headbg']['filename'] ?>) no-repeat;"
	 <?php endif; ?>
	 ><?php echo CHtml::encode($this->_blog->name); ?>
  </div>

<div id="site11ok">
	<?php echo CHtml::link(CHtml::image(Yii::app()->theme->baseUrl.'/images/logo.gif'), '/', array('id'=>'button')); ?>
</div>
</div>
<div id="middle">
	<?php echo $content; ?>
</div>
<div id="copyright">CopyRight © 11ok.net 2009-2019</div>
</body>
</html>