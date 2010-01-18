<h2>更新资料<?php echo $model->id; ?></h2>

<div class="actionBar">
[<?php echo CHtml::link('查看资料',array('show','username'=>Yii::app()->user->name)); ?>]
[<?php echo CHtml::link('编辑头像',array('avatar','username'=>Yii::app()->user->name)); ?>]
</div>

<?php echo $this->renderPartial('_formUpdate', array(
	'model'=>$model,
        'blogCate'=>$blogCate,
	'update'=>true,
)); ?>