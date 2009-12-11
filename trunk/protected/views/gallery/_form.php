<div class="yiiForm">

<p>
Fields with <span class="required">*</span> are required.
</p>

<?php echo CHtml::beginForm(array('Gallery/UploadFiles'),'POST',array('enctype'=>'multipart/form-data')); ?>

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
<label>选择文件</label>
<?php
$this->widget('application.extensions.uploadify.EuploadifyWidget',
    array(
        'name'=>'uploadFiles',
        'options'=> array(
            'script' => $this->createUrl('Gallery/uploadFiles'),
            'folder' => '/uploads/'.Yii::app()->user->id,
            'scriptData' => array('extraVar' =>1234, 'PHPSESSID' => session_id()),
            'fileExt' => '*.zip;*.jpg;*gif;*png',
            'buttonText' => 'Select Files',
            'buttonImg'=>'/images/browse-files.png',
            'wmode'=>'transparent',
            'width'=>102,
            'queueID'=>'FilesQueue',
            'auto' => false,
            'multi' => true,
            ),
        'callbacks' => array(
           'onError' => 'function(event,queueId,fileObj,errorObj){alert("Error: " + errorObj.type + "\nInfo: " + errorObj.info);}',
           'onComplete' => 'function(event,queueId,fileObj,response,data){alert("完成" + fileObj.name + response);}',
           'onAllComplete' => 'function(event,data){alert("完成" + data.filesUploaded );}',
           'onCancel' => 'function(event,queueId,fileObj,data){}',
        )
    ));
?>
</div>
<div class="simple">
    <label>&nbsp;</label>
    <a href="javascript:$('#uploadFiles').uploadifyUpload();">上传文件</a> | <a href="javascript:$('#uploadFiles').uploadifyClearQueue();">清除队列</a>
</div>
<div id="FilesQueue" style="margin-left:100px;width:395px;height:200px;border:1px solid #d5d5d5;overflow:auto;margin-bottom:10px;padding:2px 5px;"> </div>
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