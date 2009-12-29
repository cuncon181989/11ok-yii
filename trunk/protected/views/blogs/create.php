<h2>New Blogs</h2>

<div class="actionBar">[<?php echo CHtml::link('Blogs List',array('list')); ?>]
[<?php echo CHtml::link('Manage Blogs',array('admin')); ?>]</div>

<?php echo $this->renderPartial('_form', array(
	'model'=>$model,
	'update'=>false,
)); ?>