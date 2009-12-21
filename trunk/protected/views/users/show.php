<h2>View Users <?php echo $model->id; ?></h2>

<div class="actionBar">
[<?php echo CHtml::link('用户列表',array('list')); ?>]
[<?php echo CHtml::link('编辑资料',array('update','id'=>$model->id)); ?>]
</div>

<table class="dataGrid">
<tr>
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('username')); ?>
</th>
    <td><?php echo CHtml::encode($model->username); ?>
</td>
</tr>

<tr>
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('realname')); ?>
</th>
    <td><?php echo CHtml::encode($model->realname); ?>
</td>
</tr>
<tr>
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('compnay')); ?>
</th>
    <td><?php echo CHtml::encode($model->compnay); ?>
</td>
</tr>
<tr>
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('email')); ?>
</th>
    <td><?php echo CHtml::encode($model->email); ?>
</td>
</tr>
<tr>
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('avatar')); ?>
</th>
    <td><?php echo CHtml::image($model->getAvatarUrl());?>[<?php echo CHtml::link('编辑头像',array('avatar','id'=>$model->id)); ?>]
</td>
</tr>
<tr>
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('sex')); ?>
</th>
    <td><?php echo CHtml::encode($model->getUserSex()); ?>
</td>
</tr>
<tr>
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('birthday')); ?>
</th>
    <td><?php echo CHtml::encode($model->birthday); ?>
</td>
</tr>
<tr>
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('blogCategoryId')); ?>
</th>
    <td><?php echo CHtml::encode($model->blogCategory->name); ?>
</td>
</tr>
<tr>
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('province')); ?>
</th>
    <td><?php echo CHtml::encode($model->province).CHtml::encode($model->city).CHtml::encode($model->area); ?>
</td>
</tr>
<tr>
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('userStatus')); ?>
</th>
    <td><?php echo CHtml::encode($model->getUserStatus()); ?>
</td>
</tr>
<tr>
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('regIp')); ?>
</th>
    <td><?php echo CHtml::encode($model->regIp); ?>
</td>
</tr>
<tr>
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('lastLoginIp')); ?>
</th>
    <td><?php echo CHtml::encode($model->lastLoginIp); ?>
</td>
</tr>
<tr>
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('regDate')); ?>
</th>
    <td><?php echo CHtml::encode(date('Y-m-d H:i:s',$model->regDate)); ?>
</td>
</tr>
<tr>
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('lastLoginDate')); ?>
</th>
    <td><?php echo CHtml::encode(date('Y-m-d H:i:s',$model->lastLoginDate)); ?>
</td>
</tr>
</table>
