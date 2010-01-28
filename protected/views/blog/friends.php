<ul class="friend_list">
	<?php foreach($friends as $key=>$friend): ?>
	<li><?php echo CHtml::link(CHtml::image($friend->info->getAvatarUrl()), array('blog/index','username'=>$friend->info->username)); ?><br />
	    <?php echo CHtml::link(CHtml::encode($friend->info->realname),array('blog/index','username'=>$friend->info->username)); ?>
	    <?php if(Yii::app()->user->getState('isOwner')) echo CHtml::linkButton('[删除]',array(
		  'submit'=>'',
		  'params'=>array('command'=>'delete','id'=>$friend->id),
		  'confirm'=>"你真的要删除好友？\n #{$friend->id} {$friend->info->username}")); ?>
	</li>
	<?php endforeach ?>
</ul>
<div class="clr"></div>
<br />
<?php $this->widget('CLinkPager',array('pages'=>$pages)); ?>
