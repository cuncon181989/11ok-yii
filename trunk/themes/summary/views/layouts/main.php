<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>11OK搜商网，最大的商人交流平台，最多的信息发布平台，11OK搜商网您的商务洽谈平台！！</title>
<link href="<?php echo Yii::app()->theme->baseUrl ?>/css/style.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div align="center" id="wrapper">
	<div id="webHeader" align="left">
    	<div id="webLogo"><div class="logo">
                <a href="<?php echo $this->createUrl('site/index'); ?>"><img src="<?php echo Yii::app()->theme->baseUrl ?>/images/logo.gif" alt="11OK搜商网" border="0" /></a>
                </div></div>
        <div id="mainNav">
			<div id="topTextAd" align="right"><a href="#">设为首页</a>|<a href="#">加入收藏</a>|<a href="#">联系我们</a>|<a href="#">关于我们</a></div>
			<div class="Search_nav">
                                <?php echo CHtml::link('<span>首　页</span>',array('site/index'),array('class'=>'index')) ?>
                                <?php echo CHtml::link('<span>商人库</span>',array('site/list'),array('class'=>'people')) ?>
                                <a class="happy" href="http://www.11ok.net/read/"><span>充电休闲</span></a>
                                <a class="bbs" href="http://www.11ok.net/bbs/"><span>论　坛</span></a>
                        </div>
        </div>
		<div class="clr"></div>
        <div id="search">
        <?php echo CHtml::beginForm('site/search'); ?>
<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl.'/js/pcas.js'); ?>
          <span>地区：</span>
          <label>
              <select name="search[province]" class="formcss" id="select"></select>
          </label>
          <label>
              <select name="search[city]" class="formcss" id="select2"></select>
          </label>
          <span>行业：</span>
          <label>
          <?php echo CHtml::dropDownList('search[blogCategoryId]', 1, CHtml::listData($this->getBlogCategory(),'id','name'),array('class'=>'formcss')); ?>
          </label>
          <span>关键字：</span>
          <label>
            <input name="textfield" type="text" class="formcss" id="textfield" value="请输入关键字" />
          </label>
          <label>
            <input type="submit" class="buttoncss" name="button" onfocus="javascript:blur();" id="button" value="搜商友" />
          </label>
<script type="text/javascript">new PCAS("search[province]","search[city]")</script>
        <?php CHtml::endForm() ?>
        </div>
    </div>
    <div class="clr"></div>
<?php echo $content; ?>
</div>
</body>
</html>
