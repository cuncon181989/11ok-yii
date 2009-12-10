<h2>New Gallery</h2>

<div class="actionBar">
[<?php echo CHtml::link('Gallery List',array('list')); ?>]
[<?php echo CHtml::link('Manage Gallery',array('admin')); ?>]
</div>

<?php echo $this->renderPartial('_form', array(
	'model'=>$model,
        'ga'=>$ga,
	'update'=>false,
)); ?>