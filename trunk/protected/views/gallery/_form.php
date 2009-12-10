<div class="yiiForm">

<p>
Fields with <span class="required">*</span> are required.
</p>

<?php echo CHtml::beginForm(); ?>

<?php echo CHtml::errorSummary($model); ?>

<div class="simple">
<?php echo CHtml::activeLabelEx($model,'galleryAlbumsId'); ?>
<?php echo CHtml::activeDropDownList($model,'galleryAlbumsId', CHtml::listData($ga, 'id', 'name')); ?>
</div>
<div class="simple">
<?php echo CHtml::activeLabelEx($model,'status'); ?>
<?php echo CHtml::activeDropDownList($model,'status',$model->getGalleryStatus('list')); ?>
</div>
<div class="simple">
<?php echo CHtml::activeLabelEx($model,'countReads'); ?>
<?php echo CHtml::activeTextField($model,'countReads'); ?>
</div>
<div class="simple">
<?php echo CHtml::activeLabelEx($model,'countComments'); ?>
<?php echo CHtml::activeTextField($model,'countComments'); ?>
</div>
<div class="simple">
<?php echo CHtml::activeLabelEx($model,'title'); ?>
<?php echo CHtml::activeTextField($model,'title',array('size'=>50,'maxlength'=>50)); ?>
</div>
<div class="simple">
<?php echo CHtml::activeLabelEx($model,'description'); ?>
<?php echo CHtml::activeTextArea($model,'description',array('rows'=>6, 'cols'=>50)); ?>
</div>
<div class="simple">
<?php echo CHtml::activeLabelEx($model,'filePath'); ?>
<?php echo CHtml::activeTextField($model,'filePath',array('size'=>60,'maxlength'=>255)); ?>
</div>
<div class="simple">
<?php echo CHtml::activeLabelEx($model,'fileName'); ?>
<?php echo CHtml::activeTextField($model,'fileName',array('size'=>60,'maxlength'=>255)); ?>
</div>
<div class="simple">
<?php echo CHtml::activeLabelEx($model,'fileType'); ?>
<?php echo CHtml::activeTextField($model,'fileType',array('size'=>25,'maxlength'=>25)); ?>
</div>
<div class="simple">
<?php echo CHtml::activeLabelEx($model,'fileSize'); ?>
<?php echo CHtml::activeTextField($model,'fileSize'); ?>
</div>
<div class="simple">
<?php echo CHtml::activeLabelEx($model,'metaData'); ?>
<?php echo CHtml::activeTextArea($model,'metaData',array('rows'=>6, 'cols'=>50)); ?>
</div>
<div class="simple">
<?php echo CHtml::activeLabelEx($model,'settings'); ?>
<?php echo CHtml::activeTextArea($model,'settings',array('rows'=>6, 'cols'=>50)); ?>
</div>
<div class="simple">
<?php echo CHtml::activeLabelEx($model,'createDate'); ?>
<?php echo CHtml::activeTextField($model,'createDate'); ?>
</div>

<div class="action">
<?php echo CHtml::submitButton($update ? 'Save' : 'Create'); ?>
</div>

<?php echo CHtml::endForm(); ?>

</div><!-- yiiForm -->