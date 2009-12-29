<h2>博客列表</h2>


<?php $this->widget('CLinkPager',array('pages'=>$pages)); ?>

<?php if($this->beginCache('blogsList', array('duration'=>3600))) { ?>

<?php foreach($models as $n=>$model): ?>
<div class="item"><?php echo CHtml::encode($model->getAttributeLabel('usersId')); ?>:
<?php echo CHtml::encode($model->users->username); ?> <br />
<?php echo CHtml::encode($model->getAttributeLabel('blogCategoryId')); ?>:
<?php echo CHtml::encode($model->blogCategory->name); ?> <br />
<?php echo CHtml::encode($model->getAttributeLabel('name')); ?>: <?php echo CHtml::encode($model->name); ?>
<br />
<?php echo CHtml::encode($model->getAttributeLabel('about')); ?>: <?php echo CHtml::encode($model->about); ?>
<br />
<?php echo CHtml::encode($model->getAttributeLabel('createDate')); ?>: <?php echo date('Y-m-d H:i:s',$model->createDate) ?>
<br />

</div>
<?php endforeach; ?>
<br />
<?php $this->endCache(); } ?>

<?php $this->widget('CLinkPager',array('pages'=>$pages)); ?>