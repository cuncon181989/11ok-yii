<div id="webMain">
    	<div id="webLeftmain">
                <?php if ($this->_user['userType']==2): ?>
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
                <a href="diary.html" class="dTitle">>>我的日记</a>
                <?php foreach ($articles as $key=>$article): ?>
                <div id="dNeirong">
                        <div id="dBiaoti">
                                <span class="FloatLeft"><?php echo CHtml::link($article->title, array('article','aid'=>$article->id,'username'=>$this->_user['username'])); ?></span>
                                <span class="FloatRight"><?php echo CHtml::link('查看全文', array('article','aid'=>$article->id,'username'=>$this->_user['username'])); ?>|
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
            	<div id="pBiaoti"><a href="photo.html">>>我的相册</a></div>
                <div id="pzhengwen">
                	<div id="socroll_img" >
                     <div id="socroll_img1" class="socroll_content">
                      <ul>
                        <?php foreach ($galleries as $key=>$gallery): ?>
                        <li><?php echo CHtml::link(CHtml::image($gallery->getGalleryUrl()),array('gallery','gid'=>$gallery->id,'username'=>$this->_user['username'])); ?></li>
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
            	<div id="kTitle"><a href="about.html">个人资料</a></div>
                <div id="aNeirong">
                	<div class="nr-touxiang" align="center">
                    	<form>
                                <img src="<?php echo Yii::app()->theme->baseUrl; ?>/image/photo00.gif" /><br />
                        <input name="" type="button" onfocus="javascript:blur();" class="anniubj" value="加为好友" />
                        　<input type="button" onfocus="javascript:blur();" class="anniubj" value="悄悄话" />
                        <div class="clr"></div>
                        </form>
                    </div>
                    <div class="nr-ziliao">
                    	姓名：微笑、在线<br />
                      性别：女<br />
                      籍贯：湖南邵东<br />
                      生日：1989-05-11<br />
                      爱好：唱歌,跳舞,绘画,外出旅游<br />
                      企业：品牌化妆品折扣店<br />
                      地址：邵阳市敏州路口中国建设银行对面<br />
                      职位：老板<br />
                      网址：http://<br />
                      行业：(3)日化用品<br />
                      联系方式：513964832
                    </div>
                </div>
            </div>
        	<div id="webKuang">
            	<div id="kTitle">我的好友</div>
                <div id="kNeirong">
                    <div class="Rf-friend"> <a href="#"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/touxiang.gif" /></a>姓名：<a href="#" target="_blank">冷落清秋</a><br />
              	    公司：<a href="#" target="_blank">浙江品心茶业</a><br />
              	    网址：<a href="#" target="_blank">http://www.11ok.net</a>
              	    <div class="clr"></div>
                    </div>
                    <div class="Rf-friend"> <a href="#"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/touxiang.gif" /></a>姓名：<a href="#" target="_blank">冷落清秋</a><br />
              	    公司：<a href="#" target="_blank">浙江品心茶业</a><br />
              	    网址：<a href="#" target="_blank">http://www.11ok.net</a>
              	    <div class="clr"></div>
                    </div>
                    <div class="Rf-friend"> <a href="#"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/touxiang.gif" /></a>姓名：<a href="#" target="_blank">冷落清秋</a><br />
              	    公司：<a href="#" target="_blank">浙江品心茶业</a><br />
              	    网址：<a href="#" target="_blank">http://www.11ok.net</a>
              	    <div class="clr"></div>
                    </div>
                    <div class="Rf-friend"> <a href="#"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/touxiang.gif" /></a>姓名：<a href="#" target="_blank">冷落清秋</a><br />
              	    公司：<a href="#" target="_blank">浙江品心茶业</a><br />
              	    网址：<a href="#" target="_blank">http://www.11ok.net</a>
              	    <div class="clr"></div>
                    </div>
                    <div class="Rf-friend"> <a href="#"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/touxiang.gif" /></a>姓名：<a href="#" target="_blank">冷落清秋</a><br />
              	    公司：<a href="#" target="_blank">浙江品心茶业</a><br />
              	    网址：<a href="#" target="_blank">http://www.11ok.net</a>
              	    <div class="clr"></div>
                    </div>
                </div>
            </div>
            <div id="webFangke">
            	<div id="fkTitle">最近访客</div>
                <div id="fkNeirong">
                	<ul>
                    	<li><a href="#"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/touxiang.gif" /></a><br />
               	      <a href="#">闲庭信步</a></li>
                    	<li><a href="#"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/touxiang02.gif" /></a><br />
               	      <a href="#">夏末初秋</a></li>
                    	<li><a href="#"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/touxiang03.gif" /></a><br />
               	      <a href="#">临轩听雨</a></li>
                    	<li><a href="#"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/touxiang04.gif" /></a><br />
               	      <a href="#">男人如毒</a></li>
                    	<li><a href="#"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/touxiang05.gif" /></a><br />
               	      <a href="#">四叶草</a></li>
                    	<li><a href="#"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/touxiang.gif" /></a><br />
               	      <a href="#">闲庭信步</a></li>
                    </ul>
                    <div class="clr"></div>
                </div>
            </div>
        </div>
        <div class="clr"></div>
    </div>