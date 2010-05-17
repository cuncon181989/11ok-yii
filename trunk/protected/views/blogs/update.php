<h2>基本设置</h2>

<div class="actionBar">
[<?php echo CHtml::link('查看列表',array('show','username'=>Yii::app()->user->name)); ?>]
[<?php echo CHtml::link('模板设置',array('setTheme','username'=>Yii::app()->user->name)); ?>]
[<?php echo CHtml::link('用户设置',array('users/update','username'=>Yii::app()->user->name)); ?>]
</div>

<div class="okform">
<?php echo CHtml::beginForm('','post',array('enctype'=>'multipart/form-data')); ?>
<?php echo CHtml::errorSummary($model); ?>
<div class="simple">
<?php echo CHtml::activeLabelEx($model,'name'); ?>
<?php echo CHtml::activeTextField($model,'name',array('size'=>50,'maxlength'=>50)); ?>
</div>
<div class="simple">
	<?php echo CHtml::label('是否显示供求', ''); ?>
	<span class="normallist">
	<?php if($model->settings['isShowGQ']): ?>
	<?php echo CHtml::radioButtonList('isShowGQ', $model->settings['isShowGQ'], array('0'=>'不显示','1'=>'显示'), array('separator'=>' ')); ?>
	<?php else: ?>
	<?php echo CHtml::radioButtonList('isShowGQ', '0', array('0'=>'不显示','1'=>'显示'), array('separator'=>' ')); ?>
	<?php endif; ?>
	</span>
</div>
<div class="simple">
	<?php echo CHtml::label('是否显示个人信息', ''); ?>
	<span class="normallist">
	<?php if($model->settings['isShowProfile']): ?>
	<?php echo CHtml::radioButtonList('isShowProfile', $model->settings['isShowProfile'], array('0'=>'不显示','1'=>'显示'), array('separator'=>' ')); ?>
	<?php else: ?>
	<?php echo CHtml::radioButtonList('isShowProfile', '0', array('0'=>'不显示','1'=>'显示'), array('separator'=>' ')); ?>
	<?php endif; ?>
	</span>
</div>
<div class="simple">
<?php echo CHtml::activeLabelEx($model,'about'); ?>
<?php echo CHtml::activeTextArea($model,'about',array('rows'=>1, 'cols'=>50)); ?>
</div>
<div class="simple">
    <?php echo CHtml::label('自定义链接', ''); ?>
	<?php echo CHtml::activeTextArea($model,'_customLinks',array('rows'=>4, 'cols'=>50, 'wrap'=>'off')); ?>
</div>
<div class="simple">
    <?php echo CHtml::label('&nbsp;', ''); ?>
	格式：链接名称|链接网址（可以使用{username}代表当前用户名;{url}代表<?php echo Yii::app()->getRequest()->getBaseUrl(true); ?>）
</div>
	<div class="simple">
	<?php echo CHtml::label('头部背景图<br/>尺寸:'.$themeConfig['headbg']['width'].'x'.$themeConfig['headbg']['height'], 'headBg'); ?>
	<?php echo CHtml::linkButton('清除',array('params'=>array('command'=>'clearTheme'),)); ?>
	<?php if ($themeConfig['headbg']['enabled']===true): ?>
	<?php $this->widget('system.web.widgets.CMultiFileUpload',array(
			'name'=>'headBg',
			'accept'=>'gif|jpg|png',
			'denied'=>'只能是 .gif .jpg .png 类型的图片文件',
			'max'=>1,
			'remove'=>'删除',
			'selected'=>'选中的文件',
		)); ?>
	<?php endif; ?>
	</div>
<div class="simple">
<?php echo CHtml::label('&nbsp;', ''); ?>
<?php echo CHtml::submitButton('保存'); ?>
</div>
<?php echo CHtml::endForm(); ?>

</div>