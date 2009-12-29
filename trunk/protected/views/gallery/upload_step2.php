<div class="yiiForm">

<p>
系统限制一次最多选择10张图片上传！
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
            'fileDataName'=>'gallery',
            'folder' => '/uploads/'.Yii::app()->user->id,
            'scriptData' => array('ga'=>$ga, 'gs'=>$gs,'isComplete'=>0, 'PHPSESSID' => session_id()),
            'fileDesc'=>'*.jpg *.gif *.png 图片文件',
            'fileExt' => '*.jpg;*gif;*png',
            'sizeLimit'=>1572864, //2M=2*1024Kb*1024Bytes=2097152 1.5M=1572864B
            'buttonImg'=>'/images/browse-files.png',
            'wmode'=>'transparent',
            'width'=>102,
            'queueID'=>'FilesQueue',
            'queueSizeLimit'=>10,
            //'simUploadLimit'=>1, //如果这里数字改变那么onComplete里的fileCount也要跟着变要不会造成无法正确判断文件是否传完了
            'auto' => false,
            'multi' => true,
            ),
        'callbacks' => array(
           'onError' => 'function(event,queueId,fileObj,errorObj){
                $("#uploadInfo").append(fileObj.name + "上传错误! 错误类型: "+ errorObj.type + " 错误信息: "+ errorObj.info +"<br />");
           }',
           'onComplete' => 'function(event,queueId,fileObj,response,data){
                if (data.fileCount== 1){
                        $("#uploadFiles").uploadifySettings("scriptData",{"ga":'.$ga.',"gs":'.$gs.',"isComplete":1,"PHPSESSID":"'.session_id().'"});
                }
                $("#uploadInfo").append("剩余文件数："+ data.fileCount);
                $("#uploadInfo").append(fileObj.name+ "上传完成！"+ "<br />");
                $("#uploadInfo").append(response);
           }',
           'onSelectOnce' => 'function(event,data){
                if (data.fileCount== 1){
                        $("#uploadFiles").uploadifySettings("scriptData",{"ga":'.$ga.',"gs":'.$gs.',"isComplete":1,"PHPSESSID":"'.session_id().'"});
                }else{
                        $("#uploadFiles").uploadifySettings("scriptData",{"ga":'.$ga.',"gs":'.$gs.',"isComplete":0,"PHPSESSID":"'.session_id().'"});
                }
           }',
           'onAllComplete' => 'function(event,data){
                self.location="'.$this->createUrl('gallery/upload').'";
           }'
        )
    ));
?>
</div>
<div id="FilesQueue" style="margin-left:100px;width:395px;height:200px;border:1px solid #d5d5d5;overflow:auto;margin-bottom:10px;padding:2px 5px;"> </div>
<div class="simple">
    <label>&nbsp;</label>
    <?php echo CHtml::button('上传文件',array('onclick'=>"javascript:$('#uploadFiles').uploadifyUpload()")); ?> &nbsp&nbsp
    <?php echo CHtml::button('清除队列',array('onclick'=>"javascript:$('#uploadFiles').uploadifyClearQueue();")); ?>
</div>
<div id="uploadInfo"></div>
<?php echo CHtml::endForm(); ?>

</div><!-- yiiForm -->