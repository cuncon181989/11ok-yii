<h2>New Articles</h2>

<div class="actionBar">
[<?php echo CHtml::link('Articles List',array('list')); ?>]
[<?php echo CHtml::link('Manage Articles',array('admin')); ?>]
</div>
<?php echo $this->renderPartial('_form', array(
	'model'=>$model,
        'artCate'=>$artCate,
        'gArtCate'=>$gArtCate,
	'update'=>false,
)); ?>