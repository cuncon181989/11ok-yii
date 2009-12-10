<h2>Managing Gallery</h2>

<div class="actionBar">
[<?php echo CHtml::link('Gallery List',array('list')); ?>]
[<?php echo CHtml::link('New Gallery',array('create')); ?>]
</div>

<table class="dataGrid">
  <thead>
  <tr>
    <th><?php echo $sort->link('id'); ?></th>
    <th><?php echo $sort->link('galleryAlbumsId'); ?></th>
    <th><?php echo $sort->link('usersId'); ?></th>
    <th><?php echo $sort->link('blogsId'); ?></th>
    <th><?php echo $sort->link('countReads'); ?></th>
    <th><?php echo $sort->link('countComments'); ?></th>
    <th><?php echo $sort->link('title'); ?></th>
    <th><?php echo $sort->link('description'); ?></th>
    <th><?php echo $sort->link('filePath'); ?></th>
    <th><?php echo $sort->link('fileName'); ?></th>
    <th><?php echo $sort->link('fileType'); ?></th>
    <th><?php echo $sort->link('fileSize'); ?></th>
    <th><?php echo $sort->link('metaData'); ?></th>
    <th><?php echo $sort->link('settings'); ?></th>
    <th><?php echo $sort->link('createDate'); ?></th>
	<th>Actions</th>
  </tr>
  </thead>
  <tbody>
<?php foreach($models as $n=>$model): ?>
  <tr class="<?php echo $n%2?'even':'odd';?>">
    <td><?php echo CHtml::link($model->id,array('show','id'=>$model->id)); ?></td>
    <td><?php echo CHtml::encode($model->galleryAlbumsId); ?></td>
    <td><?php echo CHtml::encode($model->usersId); ?></td>
    <td><?php echo CHtml::encode($model->blogsId); ?></td>
    <td><?php echo CHtml::encode($model->countReads); ?></td>
    <td><?php echo CHtml::encode($model->countComments); ?></td>
    <td><?php echo CHtml::encode($model->title); ?></td>
    <td><?php echo CHtml::encode($model->description); ?></td>
    <td><?php echo CHtml::encode($model->filePath); ?></td>
    <td><?php echo CHtml::encode($model->fileName); ?></td>
    <td><?php echo CHtml::encode($model->fileType); ?></td>
    <td><?php echo CHtml::encode($model->fileSize); ?></td>
    <td><?php echo CHtml::encode($model->metaData); ?></td>
    <td><?php echo CHtml::encode($model->settings); ?></td>
    <td><?php echo CHtml::encode($model->createDate); ?></td>
    <td>
      <?php echo CHtml::link('Update',array('update','id'=>$model->id)); ?>
      <?php echo CHtml::linkButton('Delete',array(
      	  'submit'=>'',
      	  'params'=>array('command'=>'delete','id'=>$model->id),
      	  'confirm'=>"Are you sure to delete #{$model->id}?")); ?>
	</td>
  </tr>
<?php endforeach; ?>
  </tbody>
</table>
<br/>
<?php $this->widget('CLinkPager',array('pages'=>$pages)); ?>