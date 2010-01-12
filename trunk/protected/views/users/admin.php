<h2>管理用户</h2>

<div class="actionBar">
[<?php echo CHtml::link('用户列表',array('list','username'=>Yii::app()->user->name)); ?>]
[<?php echo CHtml::link('创建用户',array('create','username'=>Yii::app()->user->name)); ?>]
</div>

<table class="dataGrid">
  <thead>
  <tr>
    <th><?php echo $sort->link('id'); ?></th>
    <th><?php echo $sort->link('username'); ?></th>
    <th><?php echo $sort->link('email'); ?></th>
    <th><?php echo $sort->link('avatar'); ?></th>
    <th><?php echo $sort->link('sex'); ?></th>
    <th><?php echo $sort->link('birthday'); ?></th>
    <th><?php echo $sort->link('userType'); ?></th>
    <th><?php echo $sort->link('userStatus'); ?></th>
    <th><?php echo $sort->link('lastLoginDate'); ?></th>
    <th><?php echo $sort->link('regIp'); ?></th>
    <th><?php echo $sort->link('lastLoginIp'); ?></th>
    <th><?php echo $sort->link('regDate'); ?></th>
	<th>操作</th>
  </tr>
  </thead>
  <tbody>
<?php foreach($models as $n=>$model): ?>
  <tr class="<?php echo $n%2?'even':'odd';?>">
    <td><?php echo CHtml::link($model->id,array('show','id'=>$model->id)); ?></td>
    <td><?php echo CHtml::encode($model->username); ?></td>
    <td><?php echo CHtml::encode($model->email); ?></td>
    <td><?php echo CHtml::encode($model->avatar); ?></td>
    <td><?php echo CHtml::encode($model->sex); ?></td>
    <td><?php echo CHtml::encode($model->birthday); ?></td>
    <td><?php echo CHtml::encode($model->userType); ?></td>
    <td><?php echo CHtml::encode($model->userStatus); ?></td>
    <td><?php echo date('Y-m-d H:i:s',$model->lastLoginDate); ?></td>
    <td><?php echo CHtml::encode($model->regIp); ?></td>
    <td><?php echo CHtml::encode($model->lastLoginIp); ?></td>
    <td><?php echo date('Y-m-d H:i:s',$model->regDate); ?></td>
    <td>
      <?php echo CHtml::link('更新',array('update','id'=>$model->id)); ?>
      <?php echo CHtml::linkButton('删除',array(
      	  'submit'=>'',
      	  'params'=>array('command'=>'delete','id'=>$model->id),
      	  'confirm'=>"你确定要删除此用户 ID{$model->id}({$model->username})?")); ?>
	</td>
  </tr>
<?php endforeach; ?>
  </tbody>
</table>
<br/>
<?php $this->widget('CLinkPager',array('pages'=>$pages)); ?>