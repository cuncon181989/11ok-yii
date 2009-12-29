<h2>Managing GlobalArticlesCategories</h2>

<div class="actionBar">[<?php echo CHtml::link('GlobalArticlesCategories List',array('list')); ?>]
[<?php echo CHtml::link('New GlobalArticlesCategories',array('create')); ?>]
</div>

<table class="dataGrid">
	<thead>
		<tr>
			<th><?php echo $sort->link('id'); ?></th>
			<th><?php echo $sort->link('name'); ?></th>
			<th><?php echo $sort->link('description'); ?></th>
			<th><?php echo $sort->link('settings'); ?></th>
			<th><?php echo $sort->link('countArticles'); ?></th>
			<th>Actions</th>
		</tr>
	</thead>
	<tbody>
	<?php foreach($models as $n=>$model): ?>
		<tr class="<?php echo $n%2?'even':'odd';?>">
			<td><?php echo CHtml::link($model->id,array('show','id'=>$model->id)); ?></td>
			<td><?php echo CHtml::encode($model->name); ?></td>
			<td><?php echo CHtml::encode($model->description); ?></td>
			<td><?php echo CHtml::encode($model->settings); ?></td>
			<td><?php echo CHtml::encode($model->countArticles); ?></td>
			<td><?php echo CHtml::link('Update',array('update','id'=>$model->id)); ?>
			<?php echo CHtml::linkButton('Delete',array(
                                                                  'submit'=>'',
                                                                  'params'=>array('command'=>'delete','id'=>$model->id),
                                                                  'confirm'=>"Are you sure to delete #{$model->id}?")); ?>
                        </td>
		</tr>
		<?php endforeach; ?>
	</tbody>
</table>
<br />
		<?php $this->widget('CLinkPager',array('pages'=>$pages)); ?>