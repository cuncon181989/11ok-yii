<div class="okform">
    <p><strong>第一步选择分类：</strong></p>
	<div class="createcss">
<?php echo CHtml::beginForm(); ?>
<?php echo CHtml::errorSummary($model); ?>
<div class="simple">
<?php echo CHtml::activeLabelEx($model,'galleryAlbumsId'); ?>
<?php echo CHtml::activeDropDownList($model,'galleryAlbumsId', CHtml::listData($ga, 'id', 'name')); ?>　
<?php echo CHtml::link('创建相册', array('galleryAlbums/create','username'=>Yii::app()->user->name)); ?>
</div>
<div class="simple">
<?php echo CHtml::activeLabelEx($model,'status'); ?>
<?php echo CHtml::activeDropDownList($model,'status',$model->getGalleryStatus('list')); ?>
</div>
<div class="simple">
<?php echo CHtml::label('&nbsp;', ''); ?>
<?php echo CHtml::submitButton('下一步',array('name'=>'upload_step1','class'=>'anniubj')); ?>
</div>
</div>

<?php echo CHtml::endForm(); ?>

</div><!-- yiiForm -->