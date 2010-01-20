<h2>管理留言</h2>

<div class="actionBar">
[<?php echo CHtml::link('留言列表',array('blog/guestbook','username'=>$this->_user->username)); ?>]
</div>

<table class="dataGrid">
  <thead>
  <tr>
          <th><?php echo CHtml::encode('序号'); ?></th>
    <th><?php echo $sort->link('title'); ?></th>
    <th><?php echo $sort->link('content'); ?></th>
    <th><?php echo $sort->link('parentId'); ?></th>
    <th><?php echo $sort->link('private'); ?></th>
    <th><?php echo $sort->link('usersId'); ?></th>
    <th><?php echo $sort->link('userName'); ?></th>
    <th><?php echo $sort->link('userEmail'); ?></th>
    <th><?php echo $sort->link('userUrl'); ?></th>
    <th><?php echo $sort->link('clientIp'); ?></th>
    <th><?php echo $sort->link('status'); ?></th>
    <th><?php echo $sort->link('createDate'); ?></th>
	<th>操作</th>
  </tr>
  </thead>
  <tbody>
<?php foreach($models as $n=>$model): ?>
  <tr class="<?php echo $n%2?'even':'odd';?>">
    <td><?php echo $n+1; ?></td>
    <td><?php echo CHtml::encode($model->title); ?></td>
    <td><?php echo CHtml::encode($model->content); ?></td>
    <td><?php echo CHtml::encode($model->parentId); ?></td>
    <td><?php echo CHtml::encode($model->getIsPrivate()); ?></td>
    <td><?php echo CHtml::encode($model->usersId); ?></td>
    <td><?php echo CHtml::encode($model->userName); ?></td>
    <td><?php echo CHtml::encode($model->userEmail); ?></td>
    <td><?php echo CHtml::encode($model->userUrl); ?></td>
    <td><?php echo CHtml::encode($model->clientIp); ?></td>
    <td><?php echo CHtml::encode($model->status); ?></td>
    <td><?php echo CHtml::encode($model->createDate); ?></td>
    <td>
        <?php echo CHtml::linkButton('删除',array(
      	  'submit'=>'',
      	  'params'=>array('command'=>'delete','id'=>$model->id),
      	  'confirm'=>"确定删除?\n #{$model->id} {$model->title}")); ?>
	</td>
  </tr>
<?php endforeach; ?>
  </tbody>
</table>
<br/>
<?php $this->widget('CLinkPager',array('pages'=>$pages)); ?>