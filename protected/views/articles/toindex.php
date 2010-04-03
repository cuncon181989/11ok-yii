<h2>管理文章</h2>

<div class="createcss">
<div class="actionBar">
[<?php echo CHtml::link('分类管理',array('articlesCategories/admin','username'=>Yii::app()->user->name)); ?>]
</div>
<?php echo CHtml::beginForm(); ?>
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'dataProvider'=>$dataProvider,
	'summaryText'=>'显示{start}-{end}条 总共{count}条',
	'selectableRows'=>2,
	'columns'=>array(
		array(
			'class'=>'CCheckBoxColumn',
			'id'=>'checked'
		),
		'id',
		array(
			'name'=>'分类',
			'value'=>'$data->gArtCate->name',
		),
		array(
			'name'=>'title',
			'type'=>'raw',
			'value'=>'CHtml::link(CHtml::encode("$data->title"),array("blog/article","uid"=>"$data->usersId","aid"=>"$data->id"),array("target"=>"_black"))',
		),
		'createDate:datetime',
		
	)
)); ?>
<?php echo CHtml::submitButton("批准"); ?>
<?php echo CHtml::endForm(); ?>
