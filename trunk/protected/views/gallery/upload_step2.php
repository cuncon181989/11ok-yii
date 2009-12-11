<div class="yiiForm">

<p>
Fields with <span class="required">*</span> are required.
</p>

<?php echo CHtml::beginForm(array('Gallery/UploadFiles'),'POST',array('enctype'=>'multipart/form-data')); ?>
<div class="simple">
<label>选择文件</label>
<?php
$this->widget('application.extensions.uploadify.EuploadifyWidget',
    array(
        'name'=>'uploadFiles',
        'options'=> array(
            'script' => $this->createUrl('Gallery/uploadFiles'),
            'folder' => '/uploads/'.Yii::app()->user->id,
            'scriptData' => array('ga'=>$ga, 'gs'=>$gs, 'PHPSESSID' => session_id()),
            'fileExt' => '*.zip;*.jpg;*gif;*png',
            'buttonImg'=>'/images/browse-files.png',
            'wmode'=>'transparent',
            'width'=>102,
            'queueID'=>'FilesQueue',
            'auto' => false,
            'multi' => true,
            ),
        'callbacks' => array(
           'onError' => 'function(event,queueId,fileObj,errorObj){alert("Error: " + errorObj.type + "\nInfo: " + errorObj.info);}',
           'onComplete' => 'function(event,queueId,fileObj,response,data){$("#test").html(response)}',
           'onAllComplete' => 'function(event,data){alert("完成" + data.filesUploaded );}',
           'onCancel' => 'function(event,queueId,fileObj,data){}',
        )
    ));
?>
</div>
<div id="FilesQueue" style="margin-left:100px;width:395px;height:200px;border:1px solid #d5d5d5;overflow:auto;margin-bottom:10px;padding:2px 5px;"> </div>
<div class="action">
<?php //echo CHtml::submitButton('保存'); ?>
</div>
<div class="simple">
    <label>&nbsp;</label>
    <?php echo CHtml::button('上传文件',array('onclick'=>"javascript:$('#uploadFiles').uploadifyUpload()")); ?> &nbsp&nbsp
    <?php echo CHtml::button('清除队列',array('onclick'=>"javascript:$('#uploadFiles').uploadifyClearQueue();")); ?>
</div>
<div id="test"></div>
<?php echo CHtml::endForm(); ?>

</div><!-- yiiForm -->