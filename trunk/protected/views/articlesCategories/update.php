<h2>更新分类：<?php echo $model->name; ?></h2>

<div class="createcss">
<div class="actionBar">
[<?php echo CHtml::link('创建新分类',array('create','username'=>Yii::app()->user->name)); ?>]
[<?php echo CHtml::link('管理分类',array('admin','username'=>Yii::app()->user->name)); ?>]
</div>

<?php echo $this->renderPartial('_form', array(
	'model'=>$model,
	'update'=>true,
)); ?>
</div>