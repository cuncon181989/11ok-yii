<div id="left">
    <div id="left_title">我的日记
		<span class="r">
				<?php if(Yii::app()->user->getState('isOwner')){echo CHtml::link('写新文章',array('articles/create','username'=>Yii::app()->user->name));} ?>
                <?php if(Yii::app()->user->getState('isOwner')){echo CHtml::link('管理文章',array('articles/admin','username'=>Yii::app()->user->name));} ?>
                <?php if(Yii::app()->user->getState('isOwner')){echo CHtml::link('管理文章分类',array('articlesCategories/admin','username'=>Yii::app()->user->name));} ?>
		</span>
	</div>
	<div id="diary_2">
	  <div id="photo_left">
		<ul>
			<?php foreach ($this->_user->articlesCategory as $key=>$artCate): ?>
				<li>·<?php echo CHtml::link(CHtml::encode($artCate->name),array('articles','acid'=>$artCate->id,'username'=>$this->_user->username)); ?></li>
			<?php endforeach ?>
		</ul>
	  </div>
	  <div id="diary_right">
		<?php foreach ($articles as $key=>$article): ?>
		<div id="webLd" style="clear:both;">
		  <div class="Ld-all">
			<div class="Ld-title"><strong class="FloatLeft2">
			<?php echo CHtml::link($article->title, array('article','aid'=>$article->id,'username'=>$this->_user->username)); ?></strong>
				<span class="FloatRight2">
				<?php echo CHtml::link('查看全文', array('article','aid'=>$article->id,'username'=>$this->_user->username)); ?>
					|(<?php echo CHtml::encode($article->countComments); ?>)评论
					|<span>发表日期：<?php echo date('Y-m-d', $article->createDate); ?></span></span>
				<div class="clr"></div>
			</div>
			<div class="Ld-neirong"><?php echo CHtml::encode($article->summary); ?></div>
		  </div>
		</div>
		<?php endforeach ?>
		<?php $this->widget('CLinkPager',array('pages'=>$pages)); ?>
	  </div>
	</div>
</div>
<?php echo $this->renderPartial('sidebar'); ?>