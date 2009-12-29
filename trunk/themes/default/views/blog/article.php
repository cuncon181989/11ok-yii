<div id="webMain">
        <div id="webLeftmain">
                <div id="webDiary">
                        <div class="FloatLeft"><?php echo CHtml::link('&gt;&gt;我的日记', array('articles','username'=>$this->_user->username), array('class'=>'dTitle')); ?></div>
                        <div class="FloatRight diarypage"></div>
                        <div class="clr" style="height:5px;"></div>
                        <div id="dNeirong">
                               <h3><?php echo CHtml::encode($article->title); ?></h3>
                               <div>查看(<?php echo $article->countReads; ?>) 评论(<?php echo $article->countComments; ?>) 发布日期：<?php echo date('Y-m-d H:i:s',$article->createDate); ?></div>
                                <p id="dzhengwen">
                                        <?php echo $article->artText->content; ?>
                                </p>
                        </div>
                        <div id="dBiaoti"><strong class="FloatLeft">　所有评论</strong><span class="FloatRight diarypage"><a href="#">下一页</a><a href="#">上一页</a><span>共12条</span></span>
                                <div class="clr"></div></div>
                        <div id="diarypinglun">
                                <ul>
                                        <li>
                                                <span class="FloatLeft leftpinglun"><img src="images/touxiang.gif" /><br />闲庭漫步</span>
                                                <span class="FloatRight rightpinglun">用户：admin　 发表于：2009-07-24 16:09:42<br />
                                                        GT视频网站放出了，EA其下RTS全新续作《命令与征服4》</span>
                                                <div class="clr"></div>
                                        </li>
                                        <li>
                                                <span class="FloatLeft leftpinglun"><img src="images/touxiang.gif" /><br />闲庭漫步</span>
                                                <span class="FloatRight rightpinglun">用户：admin　 发表于：2009-07-24 16:09:42<br />
                                                        GT视频网站放出了，EA其下RTS全新续作《命令与征服4》
                                                        <div class="huifu">可惜我没有时间去看啊</div>
                                                </span>
                                                <div class="clr"></div>
                                        </li>
                                        <li>
                                                <span class="FloatLeft leftpinglun"><img src="images/touxiang.gif" /><br />闲庭漫步</span>
                                                <span class="FloatRight rightpinglun">用户：admin　 发表于：2009-07-24 16:09:42<br />
                                                        GT视频网站放出了，EA其下RTS全新续作《命令与征服4》征服4》
                                                        <div class="huifu">可惜我没有时间去看啊</div>
                                                </span>
                                                <div class="clr"></div>
                                        </li>
                                        <li>
                                                <span class="FloatLeft leftpinglun"><img src="images/touxiang.gif" /><br />闲庭漫步</span>
                                                <span class="FloatRight rightpinglun">用户：admin　 发表于：2009-07-24 16:09:42<br />
                                                        GT视频网站放出了，EA其下RTS全新续作《命令与征服4》GT视频网站放出了，EA其下RTS全新续作《命令与征服4》GT视频网站放出了，EA其下RTS全新续作《命令与征服4》GT视频网站放出了，EA其下RTS全新续作《命令与征服4》GT视频网站放出了，EA其下RTS全新续作《命令与征服4》</span>
                                                <div class="clr"></div>
                                        </li>
                                        <li>
                                                <span class="FloatLeft leftpinglun"><img src="images/touxiang.gif" /><br />闲庭漫步</span>
                                                <span class="FloatRight rightpinglun">用户：admin　 发表于：2009-07-24 16:09:42<br />
                                                        GT视频网站放出了，EA其下RTS全新续作《命令与征服4》征服4》
                                                        <div class="huifu">可惜我没有时间去看啊</div>
                                                </span>
                                                <div class="clr"></div>
                                        </li>
                                </ul>
                        </div>
                        <div id="dBiaoti">　<strong>发表评论</strong></div>
                        <form>
                                标题（必填）：
                                <label>
                                        <input type="text" name="textfield" id="textfield" />
                                </label>
                                <br />
                                内容（必填）：
                                <label>
                                        <textarea name="textarea" id="textarea" cols="45" rows="5"></textarea>
                                </label>
                                <br />
                                昵称（必填）：
                                <label>
                                        <input type="text" name="textfield3" id="textfield3" />
                                </label>
                                <br />
                                电子邮件：　　
                                <label>
                                        <input type="text" name="textfield2" id="textfield2" />
                                </label>
                                <br />
                                个人网页：　　
                                <label>
                                        <input type="text" name="textfield4" id="textfield4" />
                                </label>
                                <label>
                                        <div align="center">
                                                <label>
                                                        <input type="submit" name="button2" onfocus="javascript:blur();" class="anniubj" id="button2" value="重置" />

                                                </label>
                                                <label>
                                                        <input type="submit" class="anniubj" onfocus="javascript:blur();" name="button" id="button" value="提交" />
                                                </label>
                                        </div>
                        </form>
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