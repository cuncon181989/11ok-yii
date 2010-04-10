<div id="webMain">
        <div id="webLeftmain">
                <div id="webDiary">
                        <div class="FloatLeft"><?php echo CHtml::link('&gt;&gt;我的文章', array('articles','username'=>$this->_user->username), array('class'=>'dTitle')); ?></div>
                        <div class="FloatRight diarypage"><?php if(Yii::app()->user->getState('isOwner')){echo CHtml::link('添加新文章', array('articles/create','username'=>$this->_user->username));} ?></div>
                        <div class="clr"></div>
                        <div class="clr" style="height:5px;"></div>
                        <div id="dNeirong">
                               <h2><?php echo CHtml::encode($article->title); ?></h2>
                               <div class="des">查看(<?php echo $article->countReads; ?>) 评论(<?php echo $article->countComments; ?>) 发布日期：<?php echo date('Y-m-d H:i:s',$article->createDate); ?></div>
                                <p id="dzhengwen">
                                        <?php echo $article->artText->content; ?>
                                </p>
                        </div>
                        <div id="dBiaoti"><strong class="FloatLeft">　所有评论</strong><span class="FloatRight diarypage"><span>共<?php echo $article->countComments; ?>条</span></span>
                                <div class="clr"></div></div>
                        <div id="diarypinglun">
                                <ul>
                                        <?php foreach ($article->comments as $key=>$comment): ?>
                                        <li>
                                                <span class="FloatLeft leftpinglun">
                                                <?php if ($comment->usersId>0): ?>
                                                <?php echo CHtml::link(CHtml::image($comment->user->getAvatarUrl()),array('blog/index','username'=>$comment->user->username)); ?><br />
                                                <?php echo CHtml::link(CHtml::encode($comment->userName),array('blog/index','username'=>$comment->user->username)); ?>
                                                <?php else: ?>
                                                <?php echo CHtml::image(Yii::app()->getRequest()->baseUrl.'/images/guestAvatar.gif'); ?><br />
                                                <?php echo CHtml::encode($comment->userName); ?>
                                                <?php endif ?>
                                                </span>
                                                <span class="FloatRight rightpinglun">
                                                <?php echo CHtml::link(CHtml::encode($comment->title),'#',array('name'=>$comment->id)); ?><br />
                                                <?php echo CHtml::encode($comment->content); ?><br />
                                                <?php echo date('Y-m-d H:i:s',$comment->createDate); ?>
												<?php if ($this->_user->username==(Yii::app()->user->name)): ?>
												<?php echo CHtml::linkButton('删除', array(
													  'submit'=>'',
													  'params'=>array('command'=>'delete','id'=>$comment->id),
													  'confirm'=>"确定删除?\n #{$comment->id} {$comment->title}")); ?>
												<?php endif; ?>
												</span>
                                                <div class="clr"></div>
                                        </li>
                                        <?php endforeach ?>
                                </ul>
                        </div>
                        <div id="dBiaoti"><a href="#" name="addcomment" /><strong>发表评论</strong></a></div>
                        <div class="flashMsg"><?php echo Yii::app()->user->getFlash('addcommment'); ?></div>
                        <div class="okform">
							<div class="createcss">
                                <?php echo CHtml::beginForm(); ?>
                                <?php echo CHtml::errorSummary($commentModel); ?>
                                <?php if (Yii::app()->user->isGuest): ?>
                                        <div class="simple">
                                        <?php echo CHtml::activeLabelEx($commentModel,'userName'); ?>
                                        <?php echo CHtml::activeTextField($commentModel, 'userName'); ?>
                                        </div>
                                        <div class="simple">
                                        <?php echo CHtml::activeLabelEx($commentModel,'userEmail'); ?>
                                        <?php echo CHtml::activeTextField($commentModel, 'userEmail'); ?>
                                        </div>
                                        <div class="simple">
                                        <?php echo CHtml::activeLabelEx($commentModel,'userUrl'); ?>
                                        <?php echo CHtml::activeTextField($commentModel, 'userUrl'); ?>
                                        </div>
                                <?php else: ?>
                                        <?php echo CHtml::hiddenField('isLogin',1); ?>
                                <?php endif ?>
                                <div class="simple">
                                <?php echo CHtml::activeHiddenField($commentModel, 'articlesId',array('value'=>$article->id)); ?>
                                <?php echo CHtml::activeLabelEx($commentModel,'title'); ?>
                                <?php echo CHtml::activeTextField($commentModel, 'title'); ?>
                                </div>
                                <div class="simple">
                                <?php echo CHtml::activeLabelEx($commentModel,'content'); ?>
                                <?php echo CHtml::activeTextArea($commentModel, 'content', array('rows'=>3,'cols'=>30)); ?>
                                </div>
                                <div class="simple">
                                <?php echo CHtml::submitButton('提交',array('class'=>'anniubj')); ?>
                                </div>
                                <?php echo CHtml::endForm(); ?>
							</div>
                        </div>
                </div>
        </div>
        <?php echo $this->renderPartial('sidebar_article') ?>
        <div class="clr"></div>
</div>