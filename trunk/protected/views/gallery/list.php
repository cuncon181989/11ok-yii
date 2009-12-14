<h2>Gallery List</h2>

<div class="actionBar">
[<?php echo CHtml::link('New Gallery',array('create')); ?>]
[<?php echo CHtml::link('Manage Gallery',array('admin')); ?>]
</div>

<?php $this->widget('CLinkPager',array('pages'=>$pages)); ?>

<?php foreach($models as $n=>$model): ?>
<div class="item">
<?php echo CHtml::encode($model->getAttributeLabel('id')); ?>:
<?php echo CHtml::link($model->id,array('show','id'=>$model->id)); ?>
<br/>
<?php echo CHtml::encode($model->getAttributeLabel('galleryAlbumsId')); ?>:
<?php echo CHtml::encode($model->galleryAlbumsId); ?>
<br/>
<?php echo CHtml::encode($model->getAttributeLabel('usersId')); ?>:
<?php echo CHtml::encode($model->usersId); ?>
<br/>
<?php echo CHtml::encode($model->getAttributeLabel('blogsId')); ?>:
<?php echo CHtml::encode($model->blogsId); ?>
<br/>
<?php echo CHtml::encode($model->getAttributeLabel('countReads')); ?>:
<?php echo CHtml::encode($model->countReads); ?>
<br/>
<?php echo CHtml::encode($model->getAttributeLabel('countComments')); ?>:
<?php echo CHtml::encode($model->countComments); ?>
<br/>
<?php echo CHtml::encode($model->getAttributeLabel('title')); ?>:
<?php echo CHtml::encode($model->title); ?>
<br/>
<?php echo CHtml::encode($model->getAttributeLabel('description')); ?>:
<?php echo CHtml::encode($model->description); ?>
<br/>
<?php echo CHtml::encode($model->getAttributeLabel('filePath')); ?>:
<?php echo CHtml::encode($model->filePath); ?>
<br/>
<?php echo CHtml::encode($model->getAttributeLabel('fileName')); ?>:
<?php echo CHtml::encode($model->fileName); ?>
<br/>
<?php echo CHtml::encode($model->getAttributeLabel('fileType')); ?>:
<?php echo CHtml::encode($model->fileType); ?>
<br/>
<?php echo CHtml::encode($model->getAttributeLabel('fileSize')); ?>:
<?php echo CHtml::encode($model->fileSize); ?>
<br/>
<?php echo CHtml::encode($model->getAttributeLabel('metaData')); ?>:
<?php echo CHtml::encode($model->metaData); ?>
<br/>
<?php echo CHtml::encode($model->getAttributeLabel('settings')); ?>:
<?php echo $model->settings; ?>
<br/>
<?php echo CHtml::encode($model->getAttributeLabel('createDate')); ?>:
<?php echo CHtml::encode($model->createDate); ?>
<br/>

</div>
<?php endforeach; ?>
<br/>
<?php $this->widget('CLinkPager',array('pages'=>$pages)); ?>