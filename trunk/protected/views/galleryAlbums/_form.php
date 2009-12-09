<div class="yiiForm">

<p>
Fields with <span class="required">*</span> are required.
</p>

<?php echo CHtml::beginForm(); ?>

<?php echo CHtml::errorSummary($model); ?>

<div class="simple">
<?php echo CHtml::activeLabelEx($model,'parentId'); ?>
<?php echo CHtml::activeTextField($model,'parentId'); ?>
</div>
<div class="simple">
<?php echo CHtml::activeLabelEx($model,'usersId'); ?>
<?php echo CHtml::activeTextField($model,'usersId'); ?>
</div>
<div class="simple">
<?php echo CHtml::activeLabelEx($model,'blogsId'); ?>
<?php echo CHtml::activeTextField($model,'blogsId'); ?>
</div>
<div class="simple">
<?php echo CHtml::activeLabelEx($model,'countGallery'); ?>
<?php echo CHtml::activeTextField($model,'countGallery'); ?>
</div>
<div class="simple">
<?php echo CHtml::activeLabelEx($model,'name'); ?>
<?php echo CHtml::activeTextField($model,'name',array('size'=>60,'maxlength'=>255)); ?>
</div>
<div class="simple">
<?php echo CHtml::activeLabelEx($model,'description'); ?>
<?php echo CHtml::activeTextArea($model,'description',array('rows'=>6, 'cols'=>50)); ?>
</div>
<div class="simple">
<?php echo CHtml::activeLabelEx($model,'settings'); ?>
<?php echo CHtml::activeTextArea($model,'settings',array('rows'=>6, 'cols'=>50)); ?>
</div>

<div class="action">
<?php echo CHtml::submitButton($update ? 'Save' : 'Create'); ?>
</div>

<?php echo CHtml::endForm(); ?>

</div><!-- yiiForm -->