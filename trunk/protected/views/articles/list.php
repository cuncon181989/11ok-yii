<h2>文章列表</h2>

<div class="actionBar">[<?php echo CHtml::link('写新文章',array('create','username'=>Yii::app()->user->name)); ?>]
[<?php echo CHtml::link('管理文章',array('admin','username'=>Yii::app()->user->name)); ?>]</div>

<?php $this->widget('CLinkPager',array('pages'=>$pages)); ?>

<?php foreach($models as $n=>$model): ?>
<div class="item">
<?php echo CHtml::encode($model->getAttributeLabel('id')); ?>:
<?php echo CHtml::link($model->id,array('show','id'=>$model->id)); ?>
<br/>
<?php echo CHtml::encode($model->getAttributeLabel('usersId')); ?>:
<?php echo CHtml::encode($model->user->username); ?>
<br/>
<?php echo CHtml::encode($model->getAttributeLabel('globalArticlesCategoriesId')); ?>:
<?php echo CHtml::encode($model->gArtCate->name); ?>
<br/>
<?php echo CHtml::encode($model->getAttributeLabel('countReads')); ?>:
<?php echo CHtml::encode($model->countReads); ?>
<br/>
<?php echo CHtml::encode($model->getAttributeLabel('countComments')); ?>:
<?php echo CHtml::encode($model->countComments); ?>
<br/>
<?php echo CHtml::encode($model->getAttributeLabel('title')); ?>:
<?php echo CHtml::encode($model->title); ?>
<br/>
<?php echo CHtml::encode($model->getAttributeLabel('summary')); ?>:
<?php echo CHtml::encode($model->summary); ?>
<br/>
<?php echo CHtml::encode($model->getAttributeLabel('content')); ?>:
<?php echo CHtml::encode($model->artText->noHtmlContent); ?>
<br/>
<?php echo CHtml::encode($model->getAttributeLabel('createDate')); ?>:
<?php echo date('Y-m-d H:i:s',$model->createDate); ?>
<br/>
<?php echo CHtml::encode($model->getAttributeLabel('updateDate')); ?>:
<?php echo date('Y-m-d H:i:s',$model->updateDate); ?>
<br/>

</div>
<?php endforeach; ?>
<br/>
<?php $this->widget('CLinkPager',array('pages'=>$pages)); ?>