<h2>Update GalleryAlbums <?php echo $model->id; ?></h2>

<div class="actionBar">[<?php echo CHtml::link('GalleryAlbums List',array('list')); ?>]
[<?php echo CHtml::link('New GalleryAlbums',array('create')); ?>] [<?php echo CHtml::link('Manage GalleryAlbums',array('admin')); ?>]
</div>

<?php echo $this->renderPartial('_form', array(
	'model'=>$model,
	'update'=>true,
)); ?>