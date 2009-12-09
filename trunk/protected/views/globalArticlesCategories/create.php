<h2>New GlobalArticlesCategories</h2>

<div class="actionBar">
[<?php echo CHtml::link('GlobalArticlesCategories List',array('list')); ?>]
[<?php echo CHtml::link('Manage GlobalArticlesCategories',array('admin')); ?>]
</div>

<?php echo $this->renderPartial('_form', array(
	'model'=>$model,
	'update'=>false,
)); ?>