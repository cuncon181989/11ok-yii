<h2>Update GlobalArticlesCategories <?php echo $model->id; ?></h2>

<div class="actionBar">
[<?php echo CHtml::link('GlobalArticlesCategories List',array('list')); ?>]
[<?php echo CHtml::link('New GlobalArticlesCategories',array('create')); ?>]
[<?php echo CHtml::link('Manage GlobalArticlesCategories',array('admin')); ?>]
</div>

<?php echo $this->renderPartial('_form', array(
	'model'=>$model,
	'update'=>true,
)); ?>