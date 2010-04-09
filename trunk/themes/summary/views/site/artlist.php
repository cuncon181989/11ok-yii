<div id="webMain" align="left">
	<div id="webLeftmain">
		<ul class="artlist">
		<?php foreach ($articles as $key=>$article): ?>
		<li>·<?php echo CHtml::link(CHtml::encode($article->title), array('blog/article', 'aid'=>$article->id,'uid'=>$article->usersId)); ?></li>
		<?php endforeach; ?>
		</ul>
		<div class="clr"></div>
		<div id="pagbusiness"><?php $this->widget('CLinkPager',array('pages'=>$pages)); ?></div>
	</div>
	<?php echo $this->renderPartial('_sidebar_r',array('form'=>$form,)); ?>
</div>