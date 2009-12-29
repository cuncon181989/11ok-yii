<h2>查看分类<?php echo $model->id; ?></h2>

<div class="actionBar">
[<?php echo CHtml::link('分类列表',array('list')); ?>]
[<?php echo CHtml::link('新分类',array('create')); ?>]
[<?php echo CHtml::link('更新分类',array('update','id'=>$model->id)); ?>]
[<?php echo CHtml::linkButton('删除分类',array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure?')); ?>
]
[<?php echo CHtml::link('管理分类',array('admin')); ?>]
</div>

<table class="dataGrid">
<tr>
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('name')); ?>
</th>
    <td><?php echo CHtml::encode($model->name); ?>
</td>
</tr>
<tr>
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('description')); ?>
</th>
    <td><?php echo CHtml::encode($model->description); ?>
</td>
</tr>
<tr>
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('settings')); ?>
</th>
    <td><?php echo CHtml::encode($model->settings); ?>
</td>
</tr>
<tr>
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('countBlogs')); ?>
</th>
    <td><?php echo CHtml::encode($model->countBlogs); ?>
</td>
</tr>
</table>
