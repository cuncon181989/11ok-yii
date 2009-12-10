<h2>Update Gallery <?php echo $model->id; ?></h2>

<div class="actionBar">
[<?php echo CHtml::link('Gallery List',array('list')); ?>]
[<?php echo CHtml::link('New Gallery',array('create')); ?>]
[<?php echo CHtml::link('Manage Gallery',array('admin')); ?>]
</div>

<?php echo $this->renderPartial('_form', array(
	'model'=>$model,
        'ga'=>$ga,
	'update'=>true,
)); ?>