<h2>New GuestBook</h2>

<div class="actionBar">
[<?php echo CHtml::link('GuestBook List',array('list')); ?>]
[<?php echo CHtml::link('Manage GuestBook',array('admin')); ?>]
</div>

<?php echo $this->renderPartial('_form', array(
	'model'=>$model,
	'update'=>false,
)); ?>