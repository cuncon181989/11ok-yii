<h2>新分类</h2>

<div class="actionBar">
[<?php echo CHtml::link('文章分类列表',array('list')); ?>]
[<?php echo CHtml::link('管理文章分类',array('admin')); ?>]
</div>

<?php echo $this->renderPartial('_form', array(
	'model'=>$model,
	'update'=>false,
)); ?>