<h2>管理相册</h2>

<div class="actionBar">
[<?php echo CHtml::link('相册列表',array('blog/galleryAlbums','username'=>$this->_user->username)); ?>]
[<?php echo CHtml::link('创建相册',array('create','username'=>$this->_user->username)); ?>]
</div>

<table class="dataGrid">
	<thead>
		<tr>
                        <th><?php echo CHtml::encode('序号'); ?></th>
			<th><?php echo $sort->link('name'); ?></th>
			<th><?php echo $sort->link('status'); ?></th>
			<th><?php echo $sort->link('countGallery'); ?></th>
			<th><?php echo $sort->link('description'); ?></th>
			<th>操作</th>
		</tr>
	</thead>
	<tbody>
	<?php foreach($models as $n=>$model): ?>
		<tr class="<?php echo $n%2?'even':'odd';?>">
			<td><?php echo CHtml::link($n+1,array('blog/galleries','gaid'=>$model->id,'username'=>$this->_user->username)); ?></td>
			<td><?php echo CHtml::link(CHtml::encode($model->name),array('blog/galleries','gaid'=>$model->id,'username'=>$this->_user->username)); ?></td>
			<td><?php echo CHtml::encode($model->getGalleryAlbumsStatus()); ?></td>
			<td><?php echo CHtml::encode($model->countGallery); ?></td>
			<td><?php echo CHtml::encode($model->description); ?></td>
			<td><?php echo CHtml::link('更新',array('update','id'=>$model->id,'username'=>$this->_user->username)); ?>
			<?php echo CHtml::linkButton('删除',array('submit'=>'delete',
                                                          'params'=>array('command'=>'delete','id'=>$model->id),
                                                          'confirm'=>"真的要删除这个相册？\n #{$model->id}? {$model->name}")); ?></td>
		</tr>
		<?php endforeach; ?>
	</tbody>
</table>
<br />
		<?php $this->widget('CLinkPager',array('pages'=>$pages)); ?>