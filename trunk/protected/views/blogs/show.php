<h2>查看博客<?php echo $model->id; ?></h2>

<div class="actionBar">
[<?php echo CHtml::link('修改博客设置',array('update','id'=>$model->id,'username'=>Yii::app()->user->name)); ?>]
</div>

<table class="dataGrid">
<tr>
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('usersId')); ?>
</th>
    <td><?php echo CHtml::encode($model->users->username); ?>
</td>
</tr>
<tr>
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('blogCategoryId')); ?>
</th>
    <td><?php echo CHtml::encode($model->blogCategory->name); ?>
</td>
</tr>
<tr>
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('countPosts')); ?>
</th>
    <td><?php echo CHtml::encode($model->countPosts); ?>
</td>
</tr>
<tr>
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('countComments')); ?>
</th>
    <td><?php echo CHtml::encode($model->countComments); ?>
</td>
</tr>
<tr>
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('status')); ?>
</th>
    <td><?php echo CHtml::encode($model->getBlogStatus()); ?>
</td>
</tr>
<tr>
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('name')); ?>
</th>
    <td><?php echo CHtml::encode($model->name); ?>
</td>
</tr>
<tr>
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('about')); ?>
</th>
    <td><?php echo CHtml::encode($model->about); ?>
</td>
</tr>
<tr>
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('createDate')); ?>
</th>
    <td><?php echo CHtml::encode(date('Y-m-d H:i:s',$model->createDate)); ?>
</td>
</tr>
<tr>
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('updateDate')); ?>
</th>
    <td><?php echo CHtml::encode(date('Y-m-d H:i:s',$model->updateDate)); ?>
</td>
</tr>
</table>
