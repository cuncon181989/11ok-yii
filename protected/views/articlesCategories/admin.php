<h2>管理文章分类</h2>

<div class="actionBar">
[<?php echo CHtml::link('创建新分类',array('create','username'=>Yii::app()->user->name)); ?>]
[<?php echo CHtml::link('管理文章',array('articles/admin','username'=>Yii::app()->user->name)); ?>]</div>

<table class="dataGrid">
	<thead>
		<tr>
			<th><?php echo $sort->link('id'); ?></th>
			<th><?php echo $sort->link('name'); ?></th>
			<th><?php echo $sort->link('description'); ?></th>
			<th><?php echo $sort->link('countArticles'); ?></th>
			<th>操作</th>
		</tr>
	</thead>
	<tbody>
	<?php foreach($models as $n=>$model): ?>
		<tr class="<?php echo $n%2?'even':'odd';?>">
			<td><?php echo CHtml::link($model->id,array('show','id'=>$model->id)); ?></td>
			<td><?php echo CHtml::link(CHtml::encode($model->name),array('blog/articles','acid'=>$model->id,'username'=>Yii::app()->user->name)); ?></td>
			<td><?php echo CHtml::encode($model->description); ?></td>
			<td><?php echo CHtml::encode($model->countArticles); ?></td>
			<td><?php echo CHtml::link('更新',array('update','id'=>$model->id,'username'=>Yii::app()->user->name)); ?>
			<?php echo CHtml::linkButton('删除',array('submit'=>'',
								  'params'=>array('command'=>'delete','id'=>$model->id,'username'=>Yii::app()->user->name),
								  'confirm'=>"确定删除? #{$model->id} {$model->name}")); ?></td>
		</tr>
		<?php endforeach; ?>
	</tbody>
</table>
<br />
		<?php $this->widget('CLinkPager',array('pages'=>$pages)); ?>