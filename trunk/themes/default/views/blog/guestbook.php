<div id="webMain">
        <div id="webLeftmain">
                <div id="webDiary">
                        <div id="dBiaoti"><strong class="FloatLeft">　所有留言</strong><span class="FloatRight diarypage"><?php if(Yii::app()->user->getState('isOwner')){echo CHtml::link('留言管理', array('guestbook/admin','username'=>$this->_user->username));} ?></span>
                                <div class="clr"></div></div>
                        <div id="diarypinglun">
                                <ul>
                                <?php foreach ($guestbooks as $key=>$guestbook): ?>
                                        <li>
                                                <div class="FloatLeft leftpinglun">
                                                <?php if ($guestbook->usersId>0): ?>
                                                <?php echo CHtml::link(CHtml::image($guestbook->user->getAvatarUrl()),array('blog/index','username'=>$guestbook->user->username)); ?><br />
                                                <?php echo CHtml::link(CHtml::encode($guestbook->userName),array('blog/index','username'=>$guestbook->user->username)); ?>
                                                <?php else: ?>
                                                <?php echo CHtml::image(Yii::app()->getRequest()->baseUrl.'/images/guestAvatar.gif'); ?><br />
                                                <?php echo CHtml::encode($guestbook->userName); ?>
                                                <?php endif ?>
                                                </div>
                                                <div class="FloatRight rightpinglun">
                                                        <div><span class="l">标题：<?php echo CHtml::encode($guestbook->title); ?></span><span class="r"><?php if(Yii::app()->user->getState('isOwner')){echo CHtml::link('回复留言', array('guestbook/reply','gbid'=>$guestbook->id,'username'=>$this->_user->username));} ?></span></div>
                                                        <p>内容：<?php echo CHtml::encode($guestbook->content); ?></p>
                                                        <div><span class="r">发表于：<?php echo date('Y-m-d H:i:s',$guestbook->createDate); ?></span></div>
                                                </div>
                                                <div class="clr"></div>
                                        </li>
                                <?php endforeach ?>
                                </ul>
                        </div>
                        <div><?php $this->widget('CLinkPager',array('pages'=>$pages)); ?></div>
                        <div id="dBiaoti">　<strong>给我留言</strong></div>
                        <?php echo $this->renderPartial('_form', array('gb'=>$gb,
                                                                        'reply'=>false,
                                                                )); ?>
                </div>
        </div>
        <?php echo $this->renderPartial('sidebar') ?>
        <div class="clr"></div>
</div>