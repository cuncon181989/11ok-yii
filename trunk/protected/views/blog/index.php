<div id="webMain">
    	<div id="webLeftmain">
                <?php if ($this->_user->userType==2): ?>
                <div id="webGongqiu">
                <ul>
                <li><strong>我的供应</strong><br />
                        <?php foreach ($gongying as $key=>$g): ?>
                        <?php echo $key+1 .'、'.$g->title.'<br />'; ?>
                        <?php endforeach ?>
                </li>
                <li><strong>我的求购</strong><br />
                        <?php foreach ($qiqgou as $key=>$q): ?>
                        <?php echo $key+1 .'、'.$q->title.'<br />'; ?>
                        <?php endforeach ?>
                </li>
                </ul>
                <div class="clr"></div>
                </div>
                <?php endif ?>
                <div id="webDiary">
                <?php echo CHtml::link('&gt;&gt;我的日记', array('articles','username'=>$this->_user->username), array('class'=>'dTitle')); ?>
                <?php foreach ($articles as $key=>$article): ?>
                <div id="dNeirong">
                        <div id="dBiaoti">
                                <span class="FloatLeft"><?php echo CHtml::link($article->title, array('article','aid'=>$article->id,'username'=>$this->_user->username)); ?></span>
                                <span class="FloatRight"><?php echo CHtml::link('查看全文', array('article','aid'=>$article->id,'username'=>$this->_user->username)); ?>|
                                        评论(<?php echo CHtml::encode($article->countComments); ?>)|<span>发表日期：<?php echo date('Y-m-d', $article->createDate); ?></span></span>
                        <div class="clr"></div>
                        </div>
                        <div id="dzhengwen">
                                <?php echo CHtml::encode($article->summary); ?>
                        </div>
                </div>
                <?php endforeach ?>
                </div>
            <div id="webPhoto">
            	<div id="pBiaoti"><?php echo CHtml::link('&gt;&gt;我的相册', array('galleryAlbums','username'=>$this->_user->username)); ?></div>
                <div id="pzhengwen">
                	<div id="socroll_img" >
                     <div id="socroll_img1" class="socroll_content">
                      <ul>
                        <?php foreach ($galleries as $key=>$gallery): ?>
                        <li><?php echo CHtml::link(CHtml::image($gallery->getGalleryUrl()),array('gallery','gid'=>$gallery->id,'username'=>$this->_user->username)); ?></li>
                        <?php endforeach ?>
                      </ul>
                     </div>
                     <div id="socroll_img2" class="socroll_content"></div>
                  </div>
                  <SCRIPT type="text/javascript">
                        var speed=15;
                        var socroll_img1 =  document.getElementById("socroll_img1");
                        var socroll_img2 =  document.getElementById("socroll_img2");
                        var socroll_img =  document.getElementById("socroll_img");
                        socroll_img2.innerHTML=socroll_img1.innerHTML;
                        function Marquee(){
                        if(socroll_img2.offsetWidth-socroll_img.scrollLeft<=0)
                                socroll_img.scrollLeft-=socroll_img1.offsetWidth;
                        else{
                                socroll_img.scrollLeft++;
                        }
                        }
                        var MyMar=setInterval(Marquee,speed);
                        socroll_img.onmouseover=function() {clearInterval(MyMar);}
                        socroll_img.onmouseout=function() {MyMar=setInterval(Marquee,speed);}
                  </SCRIPT>
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