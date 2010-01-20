<h2>编辑上传文件的信息</h2>

<?php echo CHtml::beginForm(); ?>
<?php foreach($files as $n=>$file): ?>
<div class="item">
<span><img align="left" src="<?php echo $file->getGalleryUrl('small') ?>" /></span>
<?php echo CHtml::hiddenField($file->id.'[id]',$file->id); ?>
<?php echo CHtml::activeLabelEx($file,'title'); ?>:
<?php echo CHtml::textField($file->id.'[title]',$file->title); ?>
<br />
<?php echo CHtml::activeLabelEx($file, 'description'); ?>:
<?php echo CHtml::textArea($file->id.'[description]',$file->description); ?>
<br/>
</div>
<?php endforeach; ?>
<?php echo CHtml::submitButton('保存',array('name'=>'upload_save','class'=>'anniubj')); ?>
<?php echo CHtml::endForm(); ?>