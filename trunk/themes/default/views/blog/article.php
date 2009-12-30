<div id="webMain">
        <div id="webLeftmain">
                <div id="webDiary">
                        <div><?php echo Yii::app()->user->getFlash('addcommment'); ?></div>
                        <div class="FloatLeft"><?php echo CHtml::link('&gt;&gt;我的日记', array('articles','username'=>$this->_user->username), array('class'=>'dTitle')); ?></div>
                        <div class="FloatRight diarypage"></div>
                        <div class="clr" style="height:5px;"></div>
                        <div id="dNeirong">
                               <h3><?php echo CHtml::encode($article->title); ?></h3>
                               <div>查看(<?php echo $article->countReads; ?>) 评论(<?php echo $article->countComments; ?>) 发布日期：<?php echo date('Y-m-d H:i:s',$article->createDate); ?></div>
                                <p id="dzhengwen">
                                        <?php echo $article->artText->getNoHtmlContent(); ?>
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
                                                <?php echo CHtml::image(Yii::app()->getRequest()->baseUrl.'/images/guestAvatar.gif'); ?>
                                                <?php echo CHtml::encode($comment->userName); ?>
                                                <?php endif ?>
                                                </span>
                                                <span class="FloatRight rightpinglun">
                                                <?php echo CHtml::encode($comment->title); ?><br />
                                                <?php echo CHtml::encode($comment->content); ?><br />
                                                <?php echo date('Y-m-d H:i:s',$comment->createDate); ?></span>
                                                <div class="clr"></div>
                                        </li>
                                        <?php endforeach ?>
                                </ul>
                        </div>
                        <div id="dBiaoti"><a href="#" name="addcomment" /><strong>发表评论</strong></a></div>
                        <div class="yiiForm">
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
                                <?php echo CHtml::activeTextArea($commentModel, 'content'); ?>
                                </div>
                                <div class="simple">
                                <?php echo CHtml::submitButton('提交'); ?>
                                </div>
                                <?php echo CHtml::endForm(); ?>
                        </div>
                </div>
        </div>
        <div id="webRightmain">
                <div id="webKuang">
                        <div id="kTitle"><a href="#">个人资料</a></div>
                        <div id="aNeirong">
                                <div class="nr-touxiang" align="center">
                                        <?php echo CHtml::image($this->_user->getAvatarUrl('big')); ?><br />
                                        <div>
                                                <?php echo CHtml::link('加为好友', array('addFriend','uid'=>$this->_user->id,'username'=>Yii::app()->user->name)); ?> |
                                                <?php echo CHtml::link('悄悄话', array('addSms','uid'=>$this->_user->id,'username'=>Yii::app()->user->name)); ?>
                                        </div>
                                </div>
                                <div class="nr-ziliao">
                                        姓名：<?php echo CHtml::encode($this->_user->realname); ?><br />
                                        性别：<?php echo CHtml::encode($this->_user->getUserSex()); ?><br />
                                        籍贯：<?php echo CHtml::encode($this->_user->userinfo->native); ?><br />
                                        生日：<?php echo CHtml::encode($this->_user->birthday); ?><br />
                                        爱好：<?php echo CHtml::encode($this->_user->userinfo->hobby); ?><br />
                                        企业：<?php echo CHtml::encode($this->_user->compnay); ?><br />
                                        地址：<?php echo CHtml::encode($this->_user->userinfo->address); ?><br />
                                        职位：<?php echo CHtml::encode($this->_user->userinfo->position); ?><br />
                                        网址：<?php echo CHtml::encode($this->_user->userinfo->url); ?><br />
                                        行业：<?php echo CHtml::encode($this->_user->blogCategory->name); ?><br />
                                        手机：<?php echo CHtml::encode($this->_user->userinfo->mobilePhone); ?>
                                </div>
                        </div>
                </div>
                <div id="webKuang">
                        <div id="kTitle">我的好友</div>
                        <div id="kNeirong">
                                <?php foreach ($this->_user->friends as $key=>$friend): ?>
                                <div class="Rf-friend">
                                                <?php echo CHtml::link(CHtml::image($friend->getAvatarUrl('small')), array('blog/index','username'=>$friend->username)); ?>
                                        姓名：<?php echo CHtml::link($friend->realname, array('blog/index','username'=>$friend->username)); ?><br />
                                        公司：<?php echo CHtml::encode($friend->compnay); ?><br />
                                        行业：<?php echo CHtml::encode($friend->blogCategory->name); ?>
                                        <div class="clr"></div>
                                </div>
                                <?php endforeach ?>
                        </div>
                </div>
                <div id="webFangke">
                        <div id="fkTitle">最近访客</div>
                        <div id="fkNeirong">
                                <ul>
                                        <?php foreach ($this->_user->visits as $key=>$visit): ?>
                                        <li><?php echo CHtml::link(CHtml::image($visit->getAvatarUrl('small')), array('blog/index','username'=>$visit->username)); ?><br />
                                                <?php echo CHtml::link($visit->realname, $url); ?></li>
                                        <?php endforeach ?>
                                </ul>
                                <div class="clr"></div>
                        </div>
                </div>
        </div>
        <div class="clr"></div>
</div>