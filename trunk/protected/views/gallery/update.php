<h2>更新照片信息</h2>

<div class="actionBar">
[<?php echo CHtml::link('照片列表',array('list')); ?>]
[<?php echo CHtml::link('上传照片',array('upload')); ?>]
[<?php echo CHtml::link('管理照片',array('admin')); ?>]
</div>

<?php echo CHtml::beginForm(); ?>
<div class="okform">
        <div class="simple">
        <?php echo CHtml::label('缩略图',''); ?>
        <?php echo Chtml::image($gallery->getGalleryUrl().'s/'.$gallery->fileName); ?>
        </div>
        <div class="simple">
        <?php echo CHtml::activeLabelEx($gallery, 'title'); ?>
        <?php echo CHtml::activeTextField($gallery, 'title'); ?>
        </div>
        <div class="simple">
        <?php echo CHtml::activeLabelEx($gallery,'galleryAlbumsId'); ?>
        <?php echo CHtml::activeDropDownList($gallery,'galleryAlbumsId', CHtml::listData($ga, 'id', 'name')); ?>
        </div>
        <div class="simple">
        <?php echo CHtml::activeLabelEx($gallery,'status'); ?>
        <?php echo CHtml::activeDropDownList($gallery,'status',$gallery->getGalleryStatus('list')); ?>
        </div>
        <div class="simple">
        <?php echo CHtml::activeLabelEx($gallery, 'description'); ?>
        <?php echo CHtml::activeTextArea($gallery, 'description'); ?>
        </div>
        <?php echo CHtml::submitButton('保存',array('name'=>'upload_save')); ?>
</div>
<?php echo CHtml::endForm(); ?>
