<div id="webRightmain">
	<?php $this->renderPartial('sidebar_menu') ; ?>
	<?php if(count($this->_user->articlesCategory)>0): ?>
		<div id="webRt" class="Rt-title">文章分类</div>
		<ul id="webphotolist">
		<?php foreach ($this->_user->articlesCategory as $key=>$artCate): ?>
			<li><?php echo CHtml::link(CHtml::encode($artCate->name),array('articles','acid'=>$artCate->id,'username'=>$this->_user->username)); ?></li>
		<?php endforeach ?>
		</ul>
	<?php endif; ?>
  <div id="webRt" class="Rt-title"><?php if(Yii::app()->user->getState('isOwner')) echo CHtml::link('我的好友',array('blog/friends','username'=>$this->_user->username)); ?></div>
  <div id="webRf">
	<?php foreach ($this->_user->friends as $key=>$friend): ?>
	<div class="Rf-friend">
		<?php echo CHtml::link(CHtml::image($friend->getAvatarUrl('small')), array('blog/index','username'=>$friend->username)); ?>
		姓名：<?php echo CHtml::link($friend->realname, array('blog/index','username'=>$friend->username)); ?><br />
		公司：<?php echo CHtml::encode($friend->compnay); ?><br />
		<div class="clr"></div>
	</div>
	<?php endforeach; ?>
  </div>
  <div id="fangke">
	<div id="fkTitle">最近访客</div>
	<div id="fkNeirong">
		<ul>
		<?php foreach ($this->_user->visits as $key=>$visit): ?>
				<li><?php echo CHtml::link(CHtml::image($visit->getAvatarUrl('small')), array('blog/index','username'=>$visit->username)); ?><br />
					<?php echo CHtml::link($visit->realname, array('blog/index','username'=>$visit->username)); ?></li>
		<?php endforeach ?>
		</ul>
	</div>
  </div>
</div>