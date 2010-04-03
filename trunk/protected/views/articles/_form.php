<div class="okform">

<p>
带 <span class="required">*</span> 项目为必填项
</p>
<?php echo CHtml::beginForm(); ?>

<?php echo CHtml::errorSummary($model); ?>

<div class="simple">
<?php echo CHtml::activeLabelEx($model,'articlesCategoryId'); ?>
<?php echo CHtml::activeDropDownList($model,'articlesCategoryId',CHtml::listData($artCate,'id','name')); ?>
</div>
<div class="simple">
<?php echo CHtml::activeLabelEx($model,'globalArticlesCategoriesId'); ?>
<?php echo CHtml::activeDropDownList($model,'globalArticlesCategoriesId',CHtml::listData($gArtCate,'id','name')); ?>
</div>

<div class="simple">
<?php echo CHtml::activeLabelEx($model,'status'); ?>
<span class="normallist">
<?php echo CHtml::activeRadioButtonList($model,'status',$model->getArticlesStatus('list'),array('separator'=>' ',)); ?></span>
</div>
<div class="simple">
<?php echo CHtml::activeLabelEx($model,'title'); ?>
<?php echo CHtml::activeTextField($model,'title',array('size'=>73,'maxlength'=>255)); ?>
</div>
<div class="simple">
<?php echo CHtml::activeLabelEx($model,'summary'); ?>
<?php echo CHtml::activeTextArea($model,'summary',array('rows'=>3, 'cols'=>50)); ?>
</div>
<div class="simple">
<?php echo CHtml::activeLabelEx($model,'content'); ?>
<?php //echo CHtml::activeTextArea($model,'content',array('rows'=>6,'cols'=>50)); ?>
<?php $this->widget('application.extensions.ckeditor.CKEditor', 
    array( 'model'=>$model,
           'attribute'=>'content',
           'editorTemplate'=>'basic',
           'Options' => array(
                        'width'=>750,
                        ),
       )); ?>
</div>
<div class="simple">
<label>&nbsp;</label>
<?php echo CHtml::activeCheckBox($model,'top'); ?><?php echo $model->getAttributeLabel('top') ?>　
</div>
<div class="simple">
<label>&nbsp;</label><?php echo CHtml::submitButton($update ? '保存' : '创建',array('class'=>'anniubj')); ?>
</div>

<?php echo CHtml::endForm(); ?>

</div>