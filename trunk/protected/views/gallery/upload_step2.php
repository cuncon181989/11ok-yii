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
            'fileDesc'=>'*.jpg *.gif *.png 图片文件',
            'fileExt' => '*.jpg;*gif;*png',
            'sizeLimit'=>20480, //2M=2*1024Kb*1024Bytes=2097152
            'buttonImg'=>'/images/browse-files.png',
            'wmode'=>'transparent',
            'width'=>102,
            'queueID'=>'FilesQueue',
            'auto' => false,
            'multi' => true,
            ),
        'callbacks' => array(
           'onError' => 'function(event,queueId,fileObj,errorObj){
                $("#uploadInfo").append(fileObj.name + "上传错误! 错误类型: "+ errorObj.type + "错误信息: "+ errorObj.info +"\n");
           }',
           'onComplete' => 'function(event,queueId,fileObj,response,data){
                $("#uploadInfo").append(fileObj.name+ "上传完成！");
                $("#uploadInfo").append(response);
           }',
           'onAllComplete' => 'function(event,data){
                alert("完成上传文件数: " + data.filesUploaded );
           }',
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
<div id="uploadInfo"></div>
<?php echo CHtml::endForm(); ?>

</div><!-- yiiForm -->