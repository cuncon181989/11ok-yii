<h2>Managing GuestBook</h2>

<div class="actionBar">
[<?php echo CHtml::link('GuestBook List',array('list')); ?>]
[<?php echo CHtml::link('New GuestBook',array('create')); ?>]
</div>

<table class="dataGrid">
  <thead>
  <tr>
    <th><?php echo $sort->link('id'); ?></th>
    <th><?php echo $sort->link('blogsId'); ?></th>
    <th><?php echo $sort->link('parentId'); ?></th>
    <th><?php echo $sort->link('private'); ?></th>
    <th><?php echo $sort->link('usersId'); ?></th>
    <th><?php echo $sort->link('userName'); ?></th>
    <th><?php echo $sort->link('userEmail'); ?></th>
    <th><?php echo $sort->link('userUrl'); ?></th>
    <th><?php echo $sort->link('title'); ?></th>
    <th><?php echo $sort->link('content'); ?></th>
    <th><?php echo $sort->link('clientIp'); ?></th>
    <th><?php echo $sort->link('status'); ?></th>
    <th><?php echo $sort->link('createDate'); ?></th>
	<th>Actions</th>
  </tr>
  </thead>
  <tbody>
<?php foreach($models as $n=>$model): ?>
  <tr class="<?php echo $n%2?'even':'odd';?>">
    <td><?php echo CHtml::link($model->id,array('show','id'=>$model->id)); ?></td>
    <td><?php echo CHtml::encode($model->blogsId); ?></td>
    <td><?php echo CHtml::encode($model->parentId); ?></td>
    <td><?php echo CHtml::encode($model->private); ?></td>
    <td><?php echo CHtml::encode($model->usersId); ?></td>
    <td><?php echo CHtml::encode($model->userName); ?></td>
    <td><?php echo CHtml::encode($model->userEmail); ?></td>
    <td><?php echo CHtml::encode($model->userUrl); ?></td>
    <td><?php echo CHtml::encode($model->title); ?></td>
    <td><?php echo CHtml::encode($model->content); ?></td>
    <td><?php echo CHtml::encode($model->clientIp); ?></td>
    <td><?php echo CHtml::encode($model->status); ?></td>
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