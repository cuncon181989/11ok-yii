<h2>更新文章<?php echo $model->id; ?></h2>

<div class="actionBar">
[<?php echo CHtml::link('文章列表',array('blog/articles','username'=>Yii::app()->user->name)); ?>]
[<?php echo CHtml::link('写新文章',array('create','username'=>Yii::app()->user->name)); ?>]
[<?php echo CHtml::link('管理文章',array('admin','username'=>Yii::app()->user->name)); ?>]
</div>

<?php echo $this->renderPartial('_form', array(
	'model'=>$model,
        'artCate'=>$artCate,
        'gArtCate'=>$gArtCate,
	'update'=>true,
)); ?>