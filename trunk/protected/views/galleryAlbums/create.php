<h2>创建相册</h2>

<div class="createcss">
	<div class="actionBar">[<?php echo CHtml::link('相册列表',array('blog/galleryAlbums','username'=>$this->_user->username)); ?>]
	[<?php echo CHtml::link('管理相册',array('admin','username'=>$this->_user->username)); ?>]</div>

	<?php echo $this->renderPartial('_form', array(
		'model'=>$model,
		'update'=>false,
	)); ?>
</div>