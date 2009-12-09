<h2>文章分类列表</h2>

<div class="actionBar">
[<?php echo CHtml::link('新分类',array('create')); ?>]
[<?php echo CHtml::link('管理分类',array('admin')); ?>]
</div>

<?php $this->widget('CLinkPager',array('pages'=>$pages)); ?>

<?php foreach($models as $n=>$model): ?>
<div class="item">
<?php echo CHtml::encode($model->getAttributeLabel('id')); ?>:
<?php echo CHtml::link($model->id,array('show','id'=>$model->id)); ?> (<?php echo CHtml::link($model->blogs->name,array('blogs/show','id'=>$model->blogs->id)); ?>)
<br/>
<?php echo CHtml::encode($model->getAttributeLabel('countArticles')); ?>:
<?php echo CHtml::encode($model->countArticles); ?>
<br/>
<?php echo CHtml::encode($model->getAttributeLabel('name')); ?>:
<?php echo CHtml::encode($model->name); ?>
<br/>
<?php echo CHtml::encode($model->getAttributeLabel('description')); ?>:
<?php echo CHtml::encode($model->description); ?>
<br/>

</div>
<?php endforeach; ?>
<br/>
<?php $this->widget('CLinkPager',array('pages'=>$pages)); ?>