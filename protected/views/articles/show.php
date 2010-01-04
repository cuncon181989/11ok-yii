<h2>查看文章<?php echo $model->id; ?></h2>

<div class="actionBar">
[<?php echo CHtml::link('文章列表',array('blog/articles','username'=>Yii::app()->user->name)); ?>]
[<?php echo CHtml::link('创建文章',array('create','username'=>Yii::app()->user->name)); ?>]
[<?php echo CHtml::link('更新文章',array('update','id'=>$model->id,'username'=>Yii::app()->user->name)); ?>]
[<?php echo CHtml::linkButton('删除文章',array('submit'=>array('delete','id'=>$model->id,'username'=>Yii::app()->user->name),'confirm'=>'Are you sure?')); ?>]
[<?php echo CHtml::link('管理文章',array('admin','username'=>Yii::app()->user->name)); ?>]</div>

<table class="dataGrid">
	<tr>
		<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('articlesCategoryId')); ?>
		</th>
		<td><?php echo CHtml::encode($model->artCate->name); ?></td>
	</tr>
	<tr>
		<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('globalArticlesCategoriesId')); ?>
		</th>
		<td><?php echo CHtml::encode($model->gArtCate->name); ?></td>
	</tr>
	<tr>
		<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('countReads')); ?>
		</th>
		<td><?php echo CHtml::encode($model->countReads); ?></td>
	</tr>
	<tr>
		<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('countComments')); ?>
		</th>
		<td><?php echo CHtml::encode($model->countComments); ?></td>
	</tr>
	<tr>
		<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('top')); ?>
		</th>
		<td><?php echo CHtml::encode($model->getArticlesTop()); ?></td>
	</tr>
	<tr>
		<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('status')); ?>
		</th>
		<td><?php echo CHtml::encode($model->getArticlesStatus()); ?></td>
	</tr>
	<tr>
		<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('title')); ?>
		</th>
		<td><?php echo CHtml::encode($model->title); ?></td>
	</tr>
	<tr>
		<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('summary')); ?>
		</th>
		<td><?php echo CHtml::encode($model->summary); ?></td>
	</tr>
	</tr>
	<tr>
		<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('content')); ?>
		</th>
		<td><?php echo $model->artText->content; ?></td>
	</tr>
	<tr>
		<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('createDate')); ?>
		</th>
		<td><?php echo date('Y-m-d H:i:s',$model->createDate); ?></td>
	</tr>
	<tr>
		<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('updateDate')); ?>
		</th>
		<td><?php echo date('Y-m-d H:i:s',$model->updateDate); ?></td>
	</tr>
</table>
