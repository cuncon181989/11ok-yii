<h2>管理文章</h2>

<div class="actionBar">[<?php echo CHtml::link('文章列表',array('list')); ?>]
[<?php echo CHtml::link('写新文章',array('create')); ?>]</div>

<table class="dataGrid">
	<thead>
		<tr>
			<th><?php echo $sort->link('id'); ?></th>
			<th><?php echo $sort->link('blogsId'); ?></th>
			<th><?php echo $sort->link('usersId'); ?></th>
			<th><?php echo $sort->link('globalArticlesCategoriesId'); ?></th>
			<th><?php echo $sort->link('countReads'); ?></th>
			<th><?php echo $sort->link('countComments'); ?></th>
			<th><?php echo $sort->link('top'); ?></th>
			<th><?php echo $sort->link('status'); ?></th>
			<th><?php echo $sort->link('title'); ?></th>
			<th><?php echo $sort->link('createDate'); ?></th>
			<th>操作</th>
		</tr>
	</thead>
	<tbody>
	<?php foreach($models as $n=>$model): ?>
		<tr class="<?php echo $n%2?'even':'odd';?>">
			<td><?php echo CHtml::link($model->id,array('show','id'=>$model->id)); ?></td>
			<td><?php echo CHtml::encode($model->blogsId); ?></td>
			<td><?php echo CHtml::encode($model->usersId); ?></td>
			<td><?php echo CHtml::encode($model->globalArticlesCategoriesId); ?></td>
			<td><?php echo CHtml::encode($model->countReads); ?></td>
			<td><?php echo CHtml::encode($model->countComments); ?></td>
			<td><?php echo CHtml::encode($model->top); ?></td>
			<td><?php echo CHtml::encode($model->status); ?></td>
			<td><?php echo CHtml::encode($model->title); ?></td>
			<td><?php echo date('Y-m-d H:i:s',$model->createDate); ?></td>
			<td><?php echo CHtml::link('更新',array('update','id'=>$model->id)); ?>
			<?php echo CHtml::linkButton('删除',array(
      	  'submit'=>'',
      	  'params'=>array('command'=>'delete','id'=>$model->id),
      	  'confirm'=>"Are you sure to delete #{$model->id}?")); ?></td>
		</tr>
		<?php endforeach; ?>
	</tbody>
</table>
<br />
		<?php $this->widget('CLinkPager',array('pages'=>$pages)); ?>