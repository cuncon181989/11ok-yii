<h2>详细设置</h2>

<div class="actionBar">
[<?php echo CHtml::link('查看列表',array('show','username'=>Yii::app()->user->name)); ?>]
[<?php echo CHtml::link('基本设置',array('update','username'=>Yii::app()->user->name)); ?>]
</div>

<div class="okform">
<p>
    带<span class="required">*</span>为必填项
</p>
<?php echo CHtml::beginForm(); ?>
<div class="simple">
	<?php echo CHtml::label('测试', 'settings_theme'); ?>
	<?php echo CHtml::textField('settings[theme]', $blogs->settings['theme'],array('id'=>'settings_theme')); ?>
</div>
<div class="action">
<?php echo CHtml::submitButton('保存'); ?>
</div>

<?php echo CHtml::endForm(); ?>

</div>