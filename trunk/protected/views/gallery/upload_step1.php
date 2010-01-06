<div class="okform">
    <p>第一步选择分类：</p>
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
<div class="action">
<?php echo CHtml::submitButton('下一步',array('name'=>'upload_step1')); ?>
</div>

<?php echo CHtml::endForm(); ?>

</div><!-- yiiForm -->