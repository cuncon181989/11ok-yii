<div class="okform">

<p><strong>带<span class="required">*</span>为必填项</strong></p>

<?php echo CHtml::beginForm(); ?>
<?php echo CHtml::errorSummary($model); ?>

<div class="simple"><?php echo CHtml::activeLabelEx($model,'name'); ?> <?php echo CHtml::activeTextField($model,'name',array('size'=>60,'maxlength'=>255)); ?>
</div>
<div class="simple"><?php echo CHtml::activeLabelEx($model,'description'); ?>
<?php echo CHtml::activeTextArea($model,'description',array('rows'=>6, 'cols'=>50)); ?>
</div>
<div class="simple"><?php echo CHtml::activeLabelEx($model,'status'); ?>
<?php echo CHtml::activeDropDownList($model, 'status', $model->getGalleryAlbumsStatus('list')); ?>
</div>
<div class="action">
<?php echo CHtml::submitButton($update ? '更新' : '创建',array('class'=>'anniubj')); ?>
</div>

<?php echo CHtml::endForm(); ?></div>
