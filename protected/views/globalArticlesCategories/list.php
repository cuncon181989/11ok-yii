<h2>GlobalArticlesCategories List</h2>

<div class="actionBar">[<?php echo CHtml::link('New GlobalArticlesCategories',array('create')); ?>]
[<?php echo CHtml::link('Manage GlobalArticlesCategories',array('admin')); ?>]
</div>

<?php $this->widget('CLinkPager',array('pages'=>$pages)); ?>

<?php foreach($models as $n=>$model): ?>
<div class="item"><?php echo CHtml::encode($model->getAttributeLabel('id')); ?>:
<?php echo CHtml::link($model->id,array('show','id'=>$model->id)); ?> <br />
<?php echo CHtml::encode($model->getAttributeLabel('name')); ?>: <?php echo CHtml::encode($model->name); ?>
<br />
<?php echo CHtml::encode($model->getAttributeLabel('description')); ?>:
<?php echo CHtml::encode($model->description); ?> <br />
<?php echo CHtml::encode($model->getAttributeLabel('settings')); ?>: <?php echo CHtml::encode($model->settings); ?>
<br />
<?php echo CHtml::encode($model->getAttributeLabel('countArticles')); ?>:
<?php echo CHtml::encode($model->countArticles); ?> <br />

</div>
<?php endforeach; ?>
<br />
<?php $this->widget('CLinkPager',array('pages'=>$pages)); ?>