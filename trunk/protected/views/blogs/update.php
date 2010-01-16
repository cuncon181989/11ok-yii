<h2>基本设置</h2>

<div class="actionBar">
[<?php echo CHtml::link('查看列表',array('show','username'=>Yii::app()->user->name)); ?>]
[<?php echo CHtml::link('详细设置',array('settings','username'=>Yii::app()->user->name)); ?>]
</div>

<div class="okform">
<p>
    带<span class="required">*</span>为必填项
</p>
<?php echo CHtml::beginForm(); ?>
<?php echo CHtml::errorSummary($model); ?>
<div class="simple">
<?php echo CHtml::activeLabelEx($model,'blogCategoryId'); ?>
<?php echo CHtml::encode($model->blogCategory->name); ?>
</div>
<div class="simple">
<?php echo CHtml::activeLabelEx($model,'name'); ?>
<?php echo CHtml::activeTextField($model,'name',array('size'=>50,'maxlength'=>50)); ?>
</div>
<div class="simple">
<?php echo CHtml::activeLabelEx($model,'createDate'); ?>
<?php echo CHtml::encode(date('Y-m-d H:i:s',$model->createDate)); ?>
</div>
<div class="simple">
<?php echo CHtml::activeLabelEx($model,'about'); ?>
<?php echo CHtml::activeTextArea($model,'about',array('rows'=>6, 'cols'=>50)); ?>
</div>

<div class="action">
<?php echo CHtml::submitButton('保存'); ?>
</div>

<?php echo CHtml::endForm(); ?>

</div><!-- yiiForm -->