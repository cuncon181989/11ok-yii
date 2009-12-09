<h2>Update Blogs <?php echo $model->id; ?></h2>

<div class="actionBar">
[<?php echo CHtml::link('博客列表',array('list')); ?>]
</div>

<div class="yiiForm">
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