<h2>查看照片<?php echo $model->id; ?></h2>

<div class="actionBar">
[<?php echo CHtml::link('照片列表',array('list','username'=>$this->_user->username)); ?>]
[<?php echo CHtml::link('上传照片',array('create','username'=>$this->_user->username)); ?>]
[<?php echo CHtml::link('更新照片',array('update','id'=>$model->id,'username'=>$this->_user->username)); ?>]
[<?php echo CHtml::linkButton('删除照片',array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure?','username'=>$this->_user->username)); ?>]
[<?php echo CHtml::link('管理照片',array('admin','username'=>$this->_user->username)); ?>]</div>

<table class="dataGrid">
	<tr>
		<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('galleryAlbumsId')); ?>
		</th>
		<td><?php echo CHtml::encode($model->galleryAlbumsId); ?></td>
	</tr>
	<tr>
		<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('usersId')); ?>
		</th>
		<td><?php echo CHtml::encode($model->usersId); ?></td>
	</tr>
	<tr>
		<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('blogsId')); ?>
		</th>
		<td><?php echo CHtml::encode($model->blogsId); ?></td>
	</tr>
	<tr>
		<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('countReads')); ?>
		</th>
		<td><?php echo CHtml::encode($model->countReads); ?></td>
	</tr>
	<tr>
		<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('countComments')); ?>
		</th>
		<td><?php echo CHtml::encode($model->countComments); ?></td>
	</tr>
	<tr>
		<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('title')); ?>
		</th>
		<td><?php echo CHtml::encode($model->title); ?></td>
	</tr>
	<tr>
		<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('description')); ?>
		</th>
		<td><?php echo CHtml::encode($model->description); ?></td>
	</tr>
	<tr>
		<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('filePath')); ?>
		</th>
		<td><?php echo CHtml::encode($model->filePath); ?></td>
	</tr>
	<tr>
		<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('fileName')); ?>
		</th>
		<td><?php echo CHtml::encode($model->fileName); ?></td>
	</tr>
	<tr>
		<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('fileType')); ?>
		</th>
		<td><?php echo CHtml::encode($model->fileType); ?></td>
	</tr>
	<tr>
		<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('fileSize')); ?>
		</th>
		<td><?php echo CHtml::encode($model->fileSize); ?></td>
	</tr>
	<tr>
		<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('metaData')); ?>
		</th>
		<td><?php echo CHtml::encode($model->metaData); ?></td>
	</tr>
	<tr>
		<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('settings')); ?>
		</th>
		<td><?php echo $model->settings; ?></td>
	</tr>
	<tr>
		<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('createDate')); ?>
		</th>
		<td><?php echo CHtml::encode($model->createDate); ?></td>
	</tr>
</table>
