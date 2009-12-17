<h2>View GalleryAlbums <?php echo $model->id; ?></h2>

<div class="actionBar">
[<?php echo CHtml::link('GalleryAlbums List',array('list')); ?>]
[<?php echo CHtml::link('New GalleryAlbums',array('create')); ?>]
[<?php echo CHtml::link('Update GalleryAlbums',array('update','id'=>$model->id)); ?>]
[<?php echo CHtml::linkButton('Delete GalleryAlbums',array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure?')); ?>
]
[<?php echo CHtml::link('Manage GalleryAlbums',array('admin')); ?>]
</div>

<table class="dataGrid">

<tr>
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('usersId')); ?>
</th>
    <td><?php echo CHtml::encode($model->user->username); ?>
</td>
</tr>
<tr>
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('blogsId')); ?>
</th>
    <td><?php echo CHtml::encode($model->blog->name); ?>
</td>
</tr>
<tr>
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('countGallery')); ?>
</th>
    <td><?php echo CHtml::encode($model->countGallery); ?>
</td>
</tr>
<tr>
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('name')); ?>
</th>
    <td><?php echo CHtml::encode($model->name); ?>
</td>
</tr>
<tr>
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('description')); ?>
</th>
    <td><?php echo CHtml::encode($model->description); ?>
</td>
</tr>

</table>
<div>
        <?php foreach ($model->gallerys as $key=>$gallery):  ?>
                <img src="<?php echo $gallery->getGalleryUrl().'s/'.$gallery->fileName; ?>" />
        <?php endforeach ?>
</div>