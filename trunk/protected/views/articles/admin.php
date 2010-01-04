<h2>管理文章</h2>

<div class="actionBar">
[<?php echo CHtml::link('文章列表',array('blog/articles','username'=>Yii::app()->user->name)); ?>]
[<?php echo CHtml::link('写新文章',array('create','username'=>Yii::app()->user->name)); ?>]
</div>

<table class="dataGrid">
	<thead>
		<tr>
			<th><?php echo $sort->link('序号'); ?></th>
			<th><?php echo $sort->link('title'); ?></th>
			<th><?php echo $sort->link('articlesCategoryId'); ?></th>
			<th><?php echo $sort->link('globalArticlesCategoriesId'); ?></th>
			<th><?php echo $sort->link('countReads'); ?></th>
			<th><?php echo $sort->link('countComments'); ?></th>
			<th><?php echo $sort->link('top'); ?></th>
			<th><?php echo $sort->link('status'); ?></th>
			<th><?php echo $sort->link('createDate'); ?></th>
			<th>操作</th>
		</tr>
	</thead>
	<tbody>
	<?php foreach($models as $n=>$model): ?>
		<tr class="<?php echo $n%2?'even':'odd';?>">
			<td><?php echo CHtml::link($n+1,array('blog/article','aid'=>$model->id,'username'=>Yii::app()->user->name)); ?></td>
			<td><?php echo CHtml::link($model->title,array('blog/article','aid'=>$model->id,'username'=>Yii::app()->user->name)); ?></td>
			<td><?php echo CHtml::encode($model->artCate->name); ?></td>
			<td><?php echo CHtml::encode($model->gArtCate->name); ?></td>
			<td><?php echo CHtml::encode($model->countReads); ?></td>
			<td><?php echo CHtml::encode($model->countComments); ?></td>
			<td><?php echo CHtml::encode($model->getArticlesTop()); ?></td>
			<td><?php echo CHtml::encode($model->getArticlesStatus()); ?></td>
			<td><?php echo date('Y-m-d H:i:s',$model->createDate); ?></td>
			<td><?php echo CHtml::link('更新',array('update','id'=>$model->id,'username'=>Yii::app()->user->name)); ?>
			<?php echo CHtml::linkButton('删除',array(
      	  'submit'=>'',
      	  'params'=>array('command'=>'delete','id'=>$model->id),
      	  'confirm'=>"你真的要删除这篇文章？\n #{$model->id} $model->title")); ?></td>
		</tr>
		<?php endforeach; ?>
	</tbody>
</table>
<br />
		<?php $this->widget('CLinkPager',array('pages'=>$pages)); ?>