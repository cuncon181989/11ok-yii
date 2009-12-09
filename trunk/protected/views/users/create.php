<h2>用户注册：创建</h2>

<div class="actionBar">
[<?php echo CHtml::link('Users List',array('list')); ?>]
[<?php echo CHtml::link('Manage Users',array('admin')); ?>]
</div>

<?php echo $this->renderPartial('_form', array(
	'model'=>$model,
	'update'=>false,
)); ?>
