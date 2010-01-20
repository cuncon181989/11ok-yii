<h2>新分类</h2>

<div class="createcss">
	<div class="actionBar">
	[<?php echo CHtml::link('管理文章分类',array('admin','username'=>Yii::app()->user->name)); ?>]
	</div>

	<?php echo $this->renderPartial('_form', array(
		'model'=>$model,
		'update'=>false,
	)); ?>
</div>