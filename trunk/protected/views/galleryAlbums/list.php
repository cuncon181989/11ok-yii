<h2>GalleryAlbums List</h2>

<div class="actionBar">[<?php echo CHtml::link('New GalleryAlbums',array('create')); ?>]
[<?php echo CHtml::link('Manage GalleryAlbums',array('admin')); ?>]</div>

<?php $this->widget('CLinkPager',array('pages'=>$pages)); ?>

<?php foreach($models as $n=>$model): ?>
<div class="item"><?php echo CHtml::encode($model->getAttributeLabel('id')); ?>:
<?php echo CHtml::link($model->id,array('show','id'=>$model->id)); ?> <br />
<?php echo CHtml::encode($model->getAttributeLabel('blogsId')); ?>: <?php echo CHtml::encode($model->blogsId); ?>
<br />
<?php echo CHtml::encode($model->getAttributeLabel('countGallery')); ?>:
<?php echo CHtml::encode($model->countGallery); ?> <br />
<?php echo CHtml::encode($model->getAttributeLabel('name')); ?>: <?php echo CHtml::encode($model->name); ?>
<br />
<?php echo CHtml::encode($model->getAttributeLabel('description')); ?>:
<?php echo CHtml::encode($model->description); ?> <br />

</div>
<?php endforeach; ?>
<br />
<?php $this->widget('CLinkPager',array('pages'=>$pages)); ?>