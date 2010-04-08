<h2>管理用户</h2>

<div class="actionBar">
<?php echo CHtml::beginForm('','GET');?>
	<?php echo CHtml::label('用户名：', $for); ?>
	<?php echo CHtml::textField('q'); ?>
	<?php echo CHtml::submitButton('搜索'); ?>
<?php echo CHtml::endForm(); ?>        
</div>

<table class="dataGrid">
  <thead>
  <tr>
	<th>操作</th>
    <th><?php echo $sort->link('id'); ?></th>
    <th><?php echo $sort->link('username'); ?></th>
    <th><?php echo $sort->link('realname'); ?></th>
    <th><?php echo $sort->link('email'); ?></th>
    <th><?php echo $sort->link('sex'); ?></th>
    <th><?php echo $sort->link('userType'); ?></th>
    <th><?php echo $sort->link('userStatus'); ?></th>
    <th><?php echo $sort->link('top_site'); ?></th>
    <th><?php echo $sort->link('top_trade'); ?></th>
    <th><?php echo $sort->link('regIp'); ?></th>
    <th><?php echo $sort->link('regDate'); ?></th>
    <th><?php echo $sort->link('lastLoginDate'); ?></th>
  </tr>
  </thead>
  <tbody>
<?php foreach($models as $n=>$model): ?>
  <tr class="<?php echo $n%2?'even':'odd';?>">
    <td>
      <?php echo CHtml::link('更新',array('updateUser','id'=>$model->id)); ?>
	</td>
	<td><?php echo $model->id; ?></td>
    <td><?php echo CHtml::link(CHtml::encode($model->username),array('blog/index','username'=>$model->username)); ?></td>
    <td><?php echo CHtml::encode($model->realname); ?></td>
    <td><?php echo CHtml::encode($model->email); ?></td>
    <td><?php echo CHtml::encode($model->sex); ?></td>
    <td><?php echo CHtml::encode($model->userType); ?></td>
    <td><?php echo CHtml::encode($model->userStatus); ?></td>
    <td><?php echo CHtml::encode($model->top_site); ?></td>
    <td><?php echo CHtml::encode($model->top_trade); ?></td>
    <td><?php echo CHtml::encode($model->lastLoginIp); ?></td>
    <td><?php echo date('Y-m-d',$model->regDate); ?></td>
    <td><?php echo date('Y-m-d',$model->lastLoginDate); ?></td>
  </tr>
<?php endforeach; ?>
  </tbody>
</table>
<br/>
<?php $this->widget('CLinkPager',array('pages'=>$pages)); ?>