<div id="webMain" align="left">
	<div id="webLeftmain">
		<ul class="artlist">
		<?php foreach ($articles as $key=>$article): ?>
		<li>·<?php echo CHtml::link(CHtml::encode($article->title), array('blog/article', 'aid'=>$article->id,'uid'=>$article->usersId)); ?></li>
		<?php endforeach; ?>
		</ul>
	</div>
	<?php $this->renderPartial('_sidebar_r'); ?>
</div>