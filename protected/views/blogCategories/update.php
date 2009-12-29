<h2>更新分类：<?php echo $model->id; ?></h2>

<div class="actionBar">
[<?php echo CHtml::link('分类列表',array('list')); ?>]
[<?php echo CHtml::link('新分类',array('create')); ?>]
[<?php echo CHtml::link('管理分类',array('admin')); ?>]
</div>

<?php echo $this->renderPartial('_form', array(
	'model'=>$model,
	'update'=>true,
)); ?>