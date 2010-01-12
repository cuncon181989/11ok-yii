<h2>用户注册：创建</h2>

<div class="actionBar">
[<?php echo CHtml::link('用户列表',array('list','username'=>Yii::app()->user->name)); ?>]
[<?php echo CHtml::link('管理用户',array('admin','username'=>Yii::app()->user->name)); ?>]
</div>

<?php echo $this->renderPartial('_form', array(
	'model'=>$model,
	'update'=>false,
)); ?>
