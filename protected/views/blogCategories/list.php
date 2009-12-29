<h2>分类列表</h2>

<div class="actionBar">
[<?php echo CHtml::link('新分类',array('create')); ?>]
[<?php echo CHtml::link('管理分类',array('admin')); ?>]
</div>

<?php $this->widget('CLinkPager',array('pages'=>$pages)); ?>

<?php foreach($models as $n=>$model): ?>
<div class="item">
<?php echo CHtml::encode($model->getAttributeLabel('id')); ?>:
<?php echo CHtml::link($model->id,array('show','id'=>$model->id)); ?>
<br/>
<?php echo CHtml::encode($model->getAttributeLabel('name')); ?>:
<?php echo CHtml::encode($model->name); ?>
<?php foreach($model->blogs as $b=>$blog): ?>
<?php echo '['.$blog->name.']' ?>
<?php endforeach ?>
<br/>
<?php echo CHtml::encode($model->getAttributeLabel('description')); ?>:
<?php echo CHtml::encode($model->description); ?>
<br/>
<?php echo CHtml::encode($model->getAttributeLabel('settings')); ?>:
<?php echo CHtml::encode($model->settings); ?>
<br/>
<?php echo CHtml::encode($model->getAttributeLabel('countBlogs')); ?>:
<?php echo CHtml::encode($model->countBlogs); ?>
<br/>

</div>
<?php endforeach; ?>
<br/>
<?php $this->widget('CLinkPager',array('pages'=>$pages)); ?>