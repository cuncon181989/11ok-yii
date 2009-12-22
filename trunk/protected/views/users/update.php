<h2>Update Users <?php echo $model->id; ?></h2>

<div class="actionBar">[<?php echo CHtml::link('用户列表',array('list')); ?>]
[<?php echo CHtml::link('编辑资料',array('admin')); ?>] [<?php echo CHtml::link('编辑头像',array('avatar')); ?>]
</div>

<?php echo $this->renderPartial('_formUpdate', array(
	'model'=>$model,
        'blogCate'=>$blogCate,
	'update'=>true,
)); ?>