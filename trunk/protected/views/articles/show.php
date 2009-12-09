<h2>查看文章<?php echo $model->id; ?></h2>

<div class="actionBar">
[<?php echo CHtml::link('文章列表',array('list')); ?>]
[<?php echo CHtml::link('创建文章',array('create')); ?>]
[<?php echo CHtml::link('更新文章',array('update','id'=>$model->id)); ?>]
[<?php echo CHtml::linkButton('删除文章',array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure?')); ?>
]
[<?php echo CHtml::link('管理文章',array('admin')); ?>]
</div>

<table class="dataGrid">
<tr>
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('blogsId')); ?>
</th>
    <td><?php echo CHtml::encode($model->blog->name); ?>
</td>
</tr>
<tr>
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('usersId')); ?>
</th>
    <td><?php echo CHtml::encode($model->user->username); ?>
</td>
</tr>
<tr>
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('globalArticlesCategoriesId')); ?>
</th>
    <td><?php echo CHtml::encode($model->gArtCate->name); ?>
</td>
</tr>
<tr>
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('countReads')); ?>
</th>
    <td><?php echo CHtml::encode($model->countReads); ?>
</td>
</tr>
<tr>
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('countComments')); ?>
</th>
    <td><?php echo CHtml::encode($model->countComments); ?>
</td>
</tr>
<tr>
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('top')); ?>
</th>
    <td><?php echo CHtml::encode($model->top); ?>
</td>
</tr>
<tr>
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('status')); ?>
</th>
    <td><?php echo CHtml::encode($model->status); ?>
</td>
</tr>
<tr>
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('title')); ?>
</th>
    <td><?php echo CHtml::encode($model->title); ?>
</td>
</tr>
<tr>
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('summary')); ?>
</th>
    <td><?php echo CHtml::encode($model->summary); ?>
</td>
</tr>
</tr>
<tr>
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('content')); ?>
</th>
    <td><?php echo $model->artText->content; ?>
</td>
</tr>
<tr>
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('content')); ?>
</th>
    <td><?php echo nl2br($model->artText->noHtmlContent); ?>
</td>
</tr>
<tr>
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('settings')); ?>
</th>
    <td><?php echo CHtml::encode($model->settings); ?>
</td>
</tr>
<tr>
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('createDate')); ?>
</th>
    <td><?php echo date('Y-m-d H:i:s',$model->createDate); ?>
</td>
</tr>
<tr>
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('updateDate')); ?>
</th>
    <td><?php echo date('Y-m-d H:i:s',$model->updateDate); ?>
</td>
</tr>
</table>
