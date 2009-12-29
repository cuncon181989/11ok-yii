<h2>View GlobalArticlesCategories <?php echo $model->id; ?></h2>

<div class="actionBar">[<?php echo CHtml::link('GlobalArticlesCategories List',array('list')); ?>]
[<?php echo CHtml::link('New GlobalArticlesCategories',array('create')); ?>]
[<?php echo CHtml::link('Update GlobalArticlesCategories',array('update','id'=>$model->id)); ?>]
[<?php echo CHtml::linkButton('Delete GlobalArticlesCategories',array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure?')); ?>
] [<?php echo CHtml::link('Manage GlobalArticlesCategories',array('admin')); ?>]
</div>

<table class="dataGrid">
	<tr>
		<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('name')); ?>
		</th>
		<td><?php echo CHtml::encode($model->name); ?></td>
	</tr>
	<tr>
		<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('description')); ?>
		</th>
		<td><?php echo CHtml::encode($model->description); ?></td>
	</tr>
	<tr>
		<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('settings')); ?>
		</th>
		<td><?php echo CHtml::encode($model->settings); ?></td>
	</tr>
	<tr>
		<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('countArticles')); ?>
		</th>
		<td><?php echo CHtml::encode($model->countArticles); ?></td>
	</tr>
</table>
