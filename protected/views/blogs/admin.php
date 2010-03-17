<h2>管理</h2>


<table class="dataGrid">
	<thead>
		<tr>
			<th><?php echo $sort->link('id'); ?></th>
			<th><?php echo $sort->link('usersId'); ?></th>
			<th><?php echo $sort->link('blogCategoryId'); ?></th>
			<th><?php echo $sort->link('countPosts'); ?></th>
			<th><?php echo $sort->link('countComments'); ?></th>
			<th><?php echo $sort->link('status'); ?></th>
			<th><?php echo $sort->link('name'); ?></th>
			<th><?php echo $sort->link('about'); ?></th>
			<th><?php echo $sort->link('createDate'); ?></th>
			<th><?php echo $sort->link('updateDate'); ?></th>
			<th>Actions</th>
		</tr>
	</thead>
	<tbody>
	<?php foreach($models as $n=>$model): ?>
		<tr class="<?php echo $n%2?'even':'odd';?>">
			<td><?php echo CHtml::link($model->id,array('show','id'=>$model->id)); ?></td>
			<td><?php echo CHtml::encode($model->usersId); ?></td>
			<td><?php echo CHtml::encode($model->blogCategoryId); ?></td>
			<td><?php echo CHtml::encode($model->countPosts); ?></td>
			<td><?php echo CHtml::encode($model->countComments); ?></td>
			<td><?php echo CHtml::encode($model->status); ?></td>
			<td><?php echo CHtml::encode($model->name); ?></td>
			<td><?php echo CHtml::encode($model->about); ?></td>
			<td><?php echo date('Y-m-d',$model->createDate); ?></td>
			<td><?php echo date('Y-m-d',$model->updateDate); ?></td>
			<td><?php echo CHtml::link('更新',array('adminblog','id'=>$model->id)); ?>
			<?php echo CHtml::linkButton('禁用',array(
                          'submit'=>'',
                          'params'=>array('command'=>'disable','id'=>$model->id),
                          'confirm'=>"确定禁用此博客 #{$model->name}?")); ?></td>
		</tr>
		<?php endforeach; ?>
	</tbody>
</table>
<br />
		<?php $this->widget('CLinkPager',array('pages'=>$pages)); ?>