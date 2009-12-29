<h2>Update ArticlesCategories <?php echo $model->id; ?></h2>

<div class="actionBar">[<?php echo CHtml::link('ArticlesCategories List',array('list')); ?>]
[<?php echo CHtml::link('New ArticlesCategories',array('create')); ?>] [<?php echo CHtml::link('Manage ArticlesCategories',array('admin')); ?>]
</div>

<?php echo $this->renderPartial('_form', array(
	'model'=>$model,
	'update'=>true,
)); ?>