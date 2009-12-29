<div class="yiiForm">

<p>
    带<span class="required">*</span>为必填项
</p>

<?php echo CHtml::beginForm(); ?>

<?php echo CHtml::errorSummary($model); ?>

<div class="simple">
<?php echo CHtml::activeLabelEx($model,'usersId'); ?>
<?php echo CHtml::activeTextField($model,'usersId'); ?>
</div>
<div class="simple">
<?php echo CHtml::activeLabelEx($model,'blogCategoryId'); ?>
<?php echo CHtml::activeTextField($model,'blogCategoryId'); ?>
</div>
<div class="simple">
<?php echo CHtml::activeLabelEx($model,'countPosts'); ?>
<?php echo CHtml::activeTextField($model,'countPosts'); ?>
</div>
<div class="simple">
<?php echo CHtml::activeLabelEx($model,'countComments'); ?>
<?php echo CHtml::activeTextField($model,'countComments'); ?>
</div>
<div class="simple">
<?php echo CHtml::activeLabelEx($model,'status'); ?>
<?php echo CHtml::activeTextField($model,'status'); ?>
</div>
<div class="simple">
<?php echo CHtml::activeLabelEx($model,'name'); ?>
<?php echo CHtml::activeTextField($model,'name',array('size'=>50,'maxlength'=>50)); ?>
</div>
<div class="simple">
<?php echo CHtml::activeLabelEx($model,'about'); ?>
<?php echo CHtml::activeTextArea($model,'about',array('rows'=>6, 'cols'=>50)); ?>
</div>
<div class="simple">
<?php echo CHtml::activeLabelEx($model,'settings'); ?>
<?php echo CHtml::activeTextArea($model,'settings',array('rows'=>6, 'cols'=>50)); ?>
</div>
<div class="simple">
<?php echo CHtml::activeLabelEx($model,'createDate'); ?>
<?php echo CHtml::activeTextField($model,'createDate'); ?>
</div>
<div class="simple">
<?php echo CHtml::activeLabelEx($model,'updateDate'); ?>
<?php echo CHtml::activeTextField($model,'updateDate'); ?>
</div>

<div class="action">
<?php echo CHtml::submitButton($update ? 'Save' : 'Create'); ?>
</div>

<?php echo CHtml::endForm(); ?>

</div><!-- yiiForm -->