<h2>Managing BlogCategories</h2>

<div class="actionBar">
[<?php echo CHtml::link('分类列表',array('list')); ?>]
[<?php echo CHtml::link('新分类',array('create')); ?>]
</div>

<table class="dataGrid">
  <thead>
  <tr>
    <th><?php echo $sort->link('id'); ?></th>
    <th><?php echo $sort->link('name'); ?></th>
    <th><?php echo $sort->link('description'); ?></th>
    <th><?php echo $sort->link('countBlogs'); ?></th>
	<th>Actions</th>
  </tr>
  </thead>
  <tbody>
<?php foreach($models as $n=>$model): ?>
  <tr class="<?php echo $n%2?'even':'odd';?>">
    <td><?php echo CHtml::link($model->id,array('show','id'=>$model->id)); ?></td>
    <td><?php echo CHtml::encode($model->name); ?></td>
    <td><?php echo CHtml::encode($model->description); ?></td>
    <td><?php echo CHtml::encode($model->countBlogs); ?></td>
    <td>
      <?php echo CHtml::link('更新',array('update','id'=>$model->id)); ?>
      <?php echo CHtml::linkButton('删除',array(
      	  'submit'=>'',
      	  'params'=>array('command'=>'delete','id'=>$model->id),
      	  'confirm'=>"你真的要删除分类{$model->id}：{$model->name}?")); ?>
	</td>
  </tr>
<?php endforeach; ?>
  </tbody>
</table>
<br/>
<?php $this->widget('CLinkPager',array('pages'=>$pages)); ?>