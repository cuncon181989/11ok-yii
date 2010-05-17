<div id="left">
    <div id="left_title">我的留言<span class="r"><?php if(Yii::app()->user->getState('isOwner')){echo CHtml::link('留言管理', array('GuestBook/admin','username'=>$this->_user->username));} ?></span></div>
    <div class="photo">
      <div id="webLeftmain">
          <div id="diarypinglun">
			<div id="webmessage">
			<ul>
			<?php foreach ($guestbooks as $key=>$guestbook): ?>
				<?php if ($guestbook->private==0 || Yii::app()->user->getState('isOwner')): ?>
                  <div id="message">
                  	<span class="FloatLeft border01">
						<?php if ($guestbook->usersId>0): ?>
						<?php echo CHtml::link(CHtml::image($guestbook->user->getAvatarUrl('small')),array('blog/index','username'=>$guestbook->user->username),array('title'=>$guestbook->user->username)); ?>
						<?php else: ?>
						<?php echo CHtml::image(Yii::app()->getRequest()->baseUrl.'/images/guestAvatar.gif'); ?>
						<?php endif ?>
                    </span>
                    <span class="FloatRight border02"><strong class="FloatLeft"><?php echo CHtml::encode($guestbook->title); ?></strong>
						<span class="FloatRight">
							<?php if(Yii::app()->user->getState('isOwner')){echo CHtml::link('回复', array('/GuestBook/reply','gbid'=>$guestbook->id,'username'=>Yii::app()->user->name));} ?>
							<?php if(Yii::app()->user->getState('isOwner')){echo CHtml::linkButton('删除',array('submit'=>array('/GuestBook/delete','id'=>$guestbook->id,'username'=>Yii::app()->user->name),'confirm'=>'确定删除留言及回复?'));}; ?>
							<?php echo CHtml::link(CHtml::encode($guestbook->userName),array('blog/index','username'=>$guestbook->user->username)); ?>
							发表于：<?php echo date('Y-m-d H:i:s',$guestbook->createDate); ?>
						</span><div class="clr"></div>
							<p><?php echo CHtml::encode($guestbook->content); ?></p>
							<?php if ($guestbook->reply): ?>
							<?php foreach ($guestbook->reply as $key=>$g): ?>
							<div id="huifu"><?php $g->userName; ?>回复：<?php echo CHtml::encode($g->title); ?>
									<br />内容：<?php echo CHtml::encode($g->content); ?>
									<div class="text_right"><?php if(Yii::app()->user->getState('isOwner')){echo CHtml::linkButton('删除',array('submit'=>array('/GuestBook/delete','id'=>$g->id,'username'=>Yii::app()->user->name),'confirm'=>'确定删除回复?'));}; ?> [<?php echo date('Y-m-d H:i:s',$g->createDate) ?>]</div>
							</div>
							<?php endforeach ?>
							<?php endif ?>
					</span>
                    <div class="clr"></div>
                  </div>
				<?php endif ?>
			<?php endforeach ?>
		</div>
		<div><?php $this->widget('CLinkPager',array('pages'=>$pages)); ?></div>
		<div id="webLt" class="lt-title"><strong>给我留言</strong></div>
		<?php echo $this->renderPartial('gb_form', array('gb'=>$gb,
														'reply'=>false,
												)); ?>
          </div>
        </div>
    </div>
  </div>
<?php echo $this->renderPartial('sidebar') ?>