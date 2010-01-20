<h2>写新文章</h2>
<div class="createcss">
	<div class="actionBar">
	[<?php echo CHtml::link('文章列表',array('blog/articles','username'=>Yii::app()->user->name)); ?>]　
	[<?php echo CHtml::link('管理文章',array('admin','username'=>Yii::app()->user->name)); ?>]
	</div>
	<?php echo $this->renderPartial('_form', array(
		'model'=>$model,
			'artCate'=>$artCate,
			'gArtCate'=>$gArtCate,
		'update'=>false,
	)); ?>
</div>