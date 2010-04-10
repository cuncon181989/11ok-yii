<div id="webMain">
        <div id="webLeftmain">
                <div id="webDiary">
                        <div id="dBiaoti"><strong class="FloatLeft">　所有留言</strong><span class="FloatRight diarypage"><?php if(Yii::app()->user->getState('isOwner')){echo CHtml::link('留言管理', array('GuestBook/admin','username'=>$this->_user->username));} ?></span>
                                <div class="clr"></div></div>
                        <div id="diarypinglun">
                                <ul>
                                <?php foreach ($guestbooks as $key=>$guestbook): ?>
                                        <?php if ($guestbook->private==0 || Yii::app()->user->getState('isOwner')): ?>
                                        <li>
                                                <div class="FloatLeft leftpinglun">
                                                <?php if ($guestbook->usersId>0): ?>
                                                <?php echo CHtml::link(CHtml::image($guestbook->user->getAvatarUrl('small')),array('blog/index','username'=>$guestbook->user->username)); ?><br />
                                                <?php echo CHtml::link(CHtml::encode($guestbook->userName),array('blog/index','username'=>$guestbook->user->username)); ?>
                                                <?php else: ?>
                                                <?php echo CHtml::image(Yii::app()->getRequest()->baseUrl.'/images/guestAvatar.gif'); ?><br />
                                                <?php echo CHtml::encode($guestbook->userName); ?>
                                                <?php endif ?>
                                                </div>
                                                <div class="FloatRight rightpinglun">
                                                        <div><span class="l">标题：<?php echo CHtml::encode($guestbook->title); ?></span>
                                                                <span class="r"><?php if(Yii::app()->user->getState('isOwner')){echo CHtml::link('回复留言', array('/GuestBook/reply','gbid'=>$guestbook->id,'username'=>Yii::app()->user->name));} ?>
                                                                <?php if(Yii::app()->user->getState('isOwner')){echo CHtml::linkButton('删除留言',array('submit'=>array('/GuestBook/delete','id'=>$guestbook->id,'username'=>Yii::app()->user->name),'confirm'=>'确定删除留言及回复?'));}; ?></span></div>
                                                                <br /><p>内容：<?php echo CHtml::encode($guestbook->content); ?></p>
                                                                <div class="text_right"><?php echo date('Y-m-d H:i:s',$guestbook->createDate); ?></div>
                                                                <?php if ($guestbook->reply): ?>
                                                                <?php foreach ($guestbook->reply as $key=>$g): ?>
                                                                <div class="reply"><?php $g->userName; ?>回复：<?php echo CHtml::encode($g->title); ?> 
                                                                        <br />回复内容：<?php echo CHtml::encode($g->content); ?>
                                                                        <div class="text_right"><?php if(Yii::app()->user->getState('isOwner')){echo CHtml::linkButton('删除回复',array('submit'=>array('/GuestBook/delete','id'=>$g->id,'username'=>Yii::app()->user->name),'confirm'=>'确定删除回复?'));}; ?> [<?php echo date('Y-m-d H:i:s',$g->createDate) ?>]</div>
                                                                </div>
                                                                <?php endforeach ?>
                                                                <?php endif ?>
                                                </div>
                                                <div class="clr"></div>
                                        </li>
                                        <?php endif ?>
                                <?php endforeach ?>
                                </ul>
                        </div>
                        <div><?php $this->widget('CLinkPager',array('pages'=>$pages)); ?></div>
                        <div id="dBiaoti">　<strong>给我留言</strong></div>
                        <?php echo $this->renderPartial('gb_form', array('gb'=>$gb,
                                                                        'reply'=>false,
                                                                )); ?>
                </div>
        </div>
        <?php echo $this->renderPartial('sidebar') ?>
        <div class="clr"></div>
</div>