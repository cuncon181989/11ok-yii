<h2>Users List</h2>

<div class="actionBar">
[<?php echo CHtml::link('注册新用户',array('register')); ?>]
[<?php echo CHtml::link('管理用户',array('admin')); ?>]
</div>

<?php $this->widget('CLinkPager',array('pages'=>$pages)); ?>

<?php foreach($models as $n=>$model): ?>
<div class="item">
<?php echo CHtml::encode($model->getAttributeLabel('username')); ?>:
<?php echo CHtml::encode($model->username); ?> （<?php echo CHtml::link($model->blogs->name,array('blogs/show','id'=>$model->blogs->id)) ?>）
<br/>
<?php echo CHtml::encode($model->getAttributeLabel('email')); ?>:
<?php echo CHtml::encode($model->email); ?>
<br/>
<?php echo CHtml::encode($model->getAttributeLabel('avatar')); ?>:
<?php echo CHtml::encode($model->avatar); ?>
<br/>
<?php echo CHtml::encode($model->getAttributeLabel('sex')); ?>:
<?php echo CHtml::encode($model->sex); ?>
<br/>
<?php echo CHtml::encode($model->getAttributeLabel('birthday')); ?>:
<?php echo CHtml::encode($model->birthday); ?>
<br/>
<?php echo CHtml::encode($model->getAttributeLabel('lastLoginDate')); ?>:
<?php echo date('Y-m-d H:i:s',$model->lastLoginDate); ?>
<br/>
<?php echo CHtml::encode($model->getAttributeLabel('regDate')); ?>:
<?php echo date('Y-m-d H:i:s',$model->regDate); ?>
<br/>

</div>
<?php endforeach; ?>
<br/>
<?php $this->widget('CLinkPager',array('pages'=>$pages)); ?>