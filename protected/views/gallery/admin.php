<h2>管理照片</h2>

<div class="actionBar">[<?php echo CHtml::link('照片列表',array('blog/galleryAlbums','username'=>$this->_user->username)); ?>]
[<?php echo CHtml::link('上传照片',array('upload','username'=>$this->_user->username)); ?>]</div>

<table class="dataGrid">
	<thead>
		<tr>
            <th><?php echo CHtml::encode('序号'); ?></th>
			<th><?php echo $sort->link('title'); ?></th>
			<th><?php echo $sort->link('description'); ?></th>
			<th><?php echo $sort->link('galleryAlbumsId'); ?></th>
			<th><?php echo $sort->link('status'); ?></th>
			<th><?php echo $sort->link('countReads'); ?></th>
			<th><?php echo $sort->link('countComments'); ?></th>
			<th><?php echo $sort->link('fileType'); ?></th>
			<th><?php echo $sort->link('fileSize'); ?></th>
			<th><?php echo $sort->link('createDate'); ?></th>
			<th>操作</th>
		</tr>
	</thead>
	<tbody>
	<?php foreach($models as $n=>$model): ?>
		<tr class="<?php echo $n%2?'even':'odd';?>">
			<td><?php echo CHtml::link($n+1,array('blog/gallery','gid'=>$model->id,'username'=>$this->_user->username)); ?></td>
                        <td><?php echo CHtml::image($model->getGalleryUrl('small')); ?>
                            <?php echo CHtml::link(CHtml::encode($model->title),array('blog/gallery','gid'=>$model->id,'username'=>$this->_user->username)); ?></td>
			<td><?php echo CHtml::encode($model->description); ?></td>
			<td><?php echo CHtml::link(CHtml::encode($model->galleryAlbums->name),array('blog/galleries','gaid'=>$model->galleryAlbums->id,'username'=>$this->_user->username)); ?></td>
			<td><?php echo CHtml::encode($model->getGalleryStatus()); ?></td>
			<td><?php echo CHtml::encode($model->countReads); ?></td>
			<td><?php echo CHtml::encode($model->countComments); ?></td>
			<td><?php echo CHtml::encode($model->fileType); ?></td>
			<td><?php echo round($model->fileSize/1024,2).'K'; ?></td>
			<td><?php echo date('Y-m-d H:i:s',$model->createDate); ?></td>
			<td><?php echo CHtml::link('更新',array('update','id'=>$model->id,'username'=>$this->_user->username)); ?>
			<?php echo CHtml::linkButton('删除',array(
      	  'submit'=>'',
      	  'params'=>array('command'=>'delete','id'=>$model->id),
      	  'confirm'=>"你确定要删除照片?\n #{$model->id}? {$model->title}")); ?></td>
		</tr>
		<?php endforeach; ?>
	</tbody>
</table>
<br />
		<?php $this->widget('CLinkPager',array('pages'=>$pages)); ?>