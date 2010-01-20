<h2>编辑头像</h2>

<div class="actionBar">
[<?php echo CHtml::link('更新资料',array('update','id'=>$user->id,'username'=>Yii::app()->user->name)); ?>]
</div>

<div class="okform">
    <div>第一步：上传图片</div><br />
    <div class="simple">
    <?php echo CHtml::errorSummary($user); ?>
    <?php echo CHtml::beginForm('','POST',array('enctype'=>'multipart/form-data')); ?>
    <?php echo CHtml::activeLabelEx($user,'avatar'); ?>
    <?php echo CHtml::activeFileField($user,'avatar'); ?>
    <?php echo CHtml::submitButton('上传'); ?>
    </div>
    <?php echo CHtml::endForm(); ?>
    
    <br /><div>第二步：编辑图片</div><br />
    <div class="frame" style="margin: 0 1em; width: 100px; height: 100px;">
       预览区：
       <div id="preview" style="width: 100px; height: 100px; overflow: hidden;">
        <?php echo CHtml::image($user->getAvatarUrl('big'),'预览图',array('style'=>'width:100px;height:100px;'));?>
       </div>
    </div> <br /><br />
    <div class="simple">
       选图区：(请拖动选择框来选择合适的区域。)
    <?php Yii::app()->clientScript->registerCoreScript('jquery'); ?>
    <?php Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl.'/js/jquery.imgareaselect.pack.js'); ?>
    <?php Yii::app()->clientScript->registerCssFile(Yii::app()->request->baseUrl.'/css/imgareaselect-default.css'); ?>
    <?php echo CHtml::beginForm(); ?>
    <?php echo CHtml::hiddenField('img[x1]') ?>
    <?php echo CHtml::hiddenField('img[y1]') ?>
    <?php echo CHtml::hiddenField('img[x2]') ?>
    <?php echo CHtml::hiddenField('img[y2]') ?>
    <?php echo CHtml::hiddenField('img[w]') ?>
    <?php echo CHtml::hiddenField('img[h]') ?>
    <?php echo CHtml::hiddenField('img[srcName]',$user->avatar) ?>
    <div class="frame" style="margin: 0 0.3em; width:<?php echo $avatarSize[0]; ?>px; height: <?php echo $avatarSize[1]; ?>px;">
        <?php echo CHtml::image($user->getAvatarUrl('big'),'',array('id'=>'photo'));?>
    </div> <br /><br />
    <?php echo CHtml::submitButton('保存',array('id'=>'saveAvatar','name'=>'saveAvatar')); ?>
    <?php echo CHtml::endForm(); ?>
    </div>
    <?php //echo mydebug($avatarSize); ?>
    <script type="text/javascript">
        function preview(img, selection) {
            if (!selection.width || !selection.height)
                return;
            var scaleX = 100 / selection.width;
            var scaleY = 100 / selection.height;
            $('#preview img').css({
                width: Math.round(scaleX * <?php echo $avatarSize[0]; ?>),
                height: Math.round(scaleY * <?php echo $avatarSize[1]; ?>),
                marginLeft: -Math.round(scaleX * selection.x1),
                marginTop: -Math.round(scaleY * selection.y1)
            });
            $('#img_x1').val(selection.x1);
            $('#img_y1').val(selection.y1);
            $('#img_x2').val(selection.x2);
            $('#img_y2').val(selection.y2);
            $('#img_w').val(selection.width);
            $('#img_h').val(selection.height);
        }
        $(function () {
            $('#photo').imgAreaSelect({ aspectRatio:'1:1',handles:true,fadeSpeed:200,onSelectChange:preview,x1:0,y1:0,x2:60,y2:60,minWidth:50,minHeight:50,maxWidth:300,maxheight:300});
        });
        $('#saveAvatar').click(function() {
            if($('#img_x1').val()==''|| $('#img_y1').val()==''|| $('#img_x2').val()==''|| $('#img_y2').val()==''|| $('#img_w').val()==''|| $('#img_h').val()==''){
                alert('请选择缩略图区域');
                return false;
            }else{
                return true;
            }
        });
    </script>

</div>