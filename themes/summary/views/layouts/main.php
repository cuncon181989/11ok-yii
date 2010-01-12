<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>11OK搜商网，最大的商人交流平台，最多的信息发布平台，11OK搜商网您的商务洽谈平台！！</title>
<link href="<?php echo Yii::app()->theme->baseUrl ?>/css/style.css" rel="stylesheet" type="text/css" />
<link href="<?php echo Yii::app()->theme->baseUrl ?>/css/base.css" rel="stylesheet" type="text/css" />
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
        <?php echo CHtml::beginForm(array('site/search')); ?>
<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl.'/js/pcas.js'); ?>
          <span>地区：</span>
          <label>
              <?php echo CHtml::dropDownList('search[province]',1,array(),array('class'=>'formcss')); ?>
          </label>
          <label>
              <?php echo CHtml::dropDownList('search[city]',1,array(),array('class'=>'formcss')); ?>
          </label>
          <span>行业：</span>
          <label>
          <?php echo CHtml::dropDownList('search[blogCategoryId]', '', CHtml::listData($this->getBlogCategory(),'id','name'),array('class'=>'formcss','prompt'=>"请选择行业")); ?>
          </label>
          <span>关键字：</span>
          <label>
          <?php echo CHtml::textField('search[keyword]', '请输入关键字', array('class'=>'formcss','onfocus'=>'javascript:this.value.substr(0,3)==\'请输入\'?this.value=\'\':\'\'')); ?>
          </label>
          <label>
            <?php echo CHtml::submitButton('搜商友', array('class'=>'buttoncss','onfocus'=>'javascript:blur();','name'=>'searchSubmit')); ?>
          </label>
        <?php echo CHtml::endForm(); ?>
<script type="text/javascript">new PCAS("search[province]","search[city]")</script>
        </div>
    </div>
    <div class="clr"></div>
<?php echo $content; ?>
    <div class="clr"></div>
    <div id="under">
        <div id="underFont" align="center"><a href="/index.php?op=Summary" target="_blank">首页</a>|<a href="/index.php?op=BlogList" target="_blank">商人库</a>|<a href="/read" target="_blank">充电休闲</a>|<a href="/bbs" target="_blank">论坛</a>|<a href="http://www.11ok.net/Contact%20.htm#p">关于我们</a>|<a href="http://www.11ok.net/Contact%20.htm#p">广告合作</a>|<a href="/stp" target="_blank">网站地图</a>|<a href="lianjie.html">友情链接</a>|<a href="#">全站搜索</a></div>
        <div align="center" id="underFont02">Copyright (c) 2008-2018 中国搜商网 All Rights Reserved 版权所有<br />ICP备案：<a href="http://www.miibeian.gov.cn" target="_blank">湘ICP备案中</a>  MEM:<?php echo round(memory_get_usage()/1024/1024,4). 'M (peak): '. round(memory_get_peak_usage()/1024/1024,4); ?></div>
</div>
</div>
</body>
</html>
