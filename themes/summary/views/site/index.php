    <div id="webMain" align="left">
    	<div id="webLeftmain">
        	<div id="recommend">
            	<div id="recommendfont">
                	<div class="left_neirong">
           			 <dl>
            		  <div class="tuijian-neirong"><strong>销售圣经：世界最杰出的十大推销大师</strong><br />
            		    <a href="http://www.11ok.net/read/archive.php?aid-4581.html" target="_blank">“推销”不论是过去还是现在都是我们经济繁荣和增长的推动力。纵观人类的历史，绝大多数推销员们都是工作勤奋、有能力、有知识的人，他们做出了不可估量的重要贡献。在舞台和小说里他们永远保持　阅读&gt;&gt;</a></div><dd />
           			  <dt><a href="http://www.11ok.net/read/archive.php?aid-4812.html" target="_blank">马云管理日志：最原生态的逆势哲学</a></dt>
            		  <dt><a href="http://www.11ok.net/read/archive.php?aid-4748.html" target="_blank">李彦宏的百度世界：百度发展正史</a></dt>
            		  <dt><a href="http://www.11ok.net/read/archive.php?aid-4030.html" target="_blank">走出困局：危机下企业自救之道</a></dt>
             		  <dt><a title="《2009金融风暴下的中国：中国面临的机遇与逃战》" href="http://www.11ok.net/read/archive.php?aid-3894.html" target="_blank">2009金融风暴下的中国：中国面临的机遇与逃战</a><a href="#" target="_blank"></a></dt>
          		  </dl>
       			 </div>
   			  </div>
                <div id="recommendpic"><script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/js/ad.js"></script></div>
                <div class="clr line03"></div>
            </div>
            <div id="peopleonline">
            	<div id="onlineTitle"><span>商人在线</span><a href="http://www.11ok.net/index.php?op=BlogList">更多>></a></div>
                <div class="clr"></div>
                <div id="pic_list" align="center">
                	<ul>
                    	<?php foreach ($summary->getTopSite() as $key=>$user): ?>
                        <li title="<?php echo $user->realname; ?>"><?php echo CHtml::link(CHtml::image($user->getAvatarUrl(), $user->realname), array('blog/index','uid'=>$user->id,'username'=>$user->username)); ?><br />
                            <?php echo CHtml::link($user->realname.'<br />'.$user->compnay, array('blog/index','uid'=>$user->id,'username'=>$user->username)); ?></li>
                        <?php endforeach ?>
                    </ul>
                </div>
            </div>
            <div class="clr" style="height:10px"></div>
            <div id="talent">
            	<div id="talentTitle"><span>行业人才</span><a href="http://www.11ok.net/index.php?op=BlogList">更多>></a></div>
                <div class="clr"></div>
                <div id="pic_list" align="center">
                	<ul>
                    	<?php foreach ($summary->getTopTrade() as $key=>$user): ?>
                        <li title="<?php echo $user->realname; ?>"><?php echo CHtml::link(CHtml::image($user->getAvatarUrl(), $user->realname), array('blog/index','uid'=>$user->id,'username'=>$user->username)); ?><br />
                            <?php echo CHtml::link($user->realname.'<br />'.$user->compnay, array('blog/index','uid'=>$user->id,'username'=>$user->username)); ?></li>
                        <?php endforeach ?>
                        </ul>
                </div>
            </div>
            <div class="clr" style="height:10px"></div>
            <div id="information">
            	<div id="gongying" class="FloatLeft">
                	<div id="gongyingTitle"><span>供应信息</span><a href="#">更多>></a></div>
                    <div class="clr"></div>
                    <div id="gongqiuNeirong">
                    	<ul>
                        <?php foreach ($summary->getByGCate(2) as $key=>$article): ?>
                                <li class="top<?php echo $key; ?>"><?php echo CHtml::link($article->title,array('blog/article', 'aid'=>$article->id,'uid'=>$article->usersId)); ?></li>
                        <?php endforeach ?>
                        </ul>
                    </div>
                </div>
                <div id="qiugou" class="FloatRight">
                	<div id="qiugouTitle"><span>求购信息</span><a href="#">更多>></a></div>
                    <div class="clr"></div>
                    <div id="gongqiuNeirong">
                    	<ul>
                        <?php foreach ($summary->getByGCate(3) as $key=>$article): ?>
                                <li class="top<?php echo $key; ?>"><?php echo CHtml::link($article->title,array('blog/article', 'aid'=>$article->id,'uid'=>$article->usersId)); ?></li>
                        <?php endforeach ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div id="webRightmain">
        	<div id="login">
            	<div id="loginLine01"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/loginline01.gif" /></div>
                <div id="logindetail">
                	<div id="loginTitle">欢迎登陆搜商网</div>
                    <?php if(Yii::app()->user->isGuest): ?>
                    <?php echo CHtml::beginForm(array('site/login'),'POST',array('name'=>'loginForm')); ?>
                        <div id="loginform">
                        <span>
                        <?php echo CHtml::activeLabel($form,'username'); ?>：
                        <?php echo CHtml::activeTextField($form,'username',array('size'=>15,'maxlength'=>15,'class'=>'formcss')); ?>
                        </span>
                        <span>
                        <?php echo CHtml::activeLabel($form,'password'); ?>：
                        <?php echo CHtml::activePasswordField($form,'password',array('size'=>15,'maxlength'=>15,'class'=>'formcss')); ?>
                        </span>
                        <div id="forma" align="right"><a href="#">忘记密码？</a></div>
                        <div align="center"><?php echo CHtml::submitButton('点击登陆',array('class'=>'bottomcss','onfocus'=>'javascript:blur();')); ?></div>
                        <div id="lianjiewenzi" align="center"><a href="register.html">加入搜商网,免费发布商情！</a></div>
                        </div>
                    <?php echo CHtml::endForm(); ?>
                    <?php else: ?>
                        <div>欢迎你！<?php echo Yii::app()->user->name ?></div>
                        <div><?php echo CHtml::link('进入自己的博客', array('blog/index','username'=>Yii::app()->user->name)); ?></div>
                        <div><?php echo CHtml::link('退出', array('site/logout')); ?></div>
                    <?php endif ?>
                </div>
                <div id="loginLine03"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/loginline03.gif" /></div>
            </div>
            <div id="sort">
            	<div id="sortTitle"><span>行业分类</span></div>
          <div id="sortNeirong" align="center">
                	<ul>
                    	<li class="bj1"><a href="#">化学原料</a><a href="#">颜料油漆</a><a href="#">日化用品</a></li>
                        <li class="bj0"><a href="#">燃料油脂</a><a href="#">医　　疗</a><a href="#">金属材料</a></li>
                    	<li class="bj1"><a href="#">机械设备</a><a href="#">手工机械</a><a href="#">科学仪器</a></li>
                        <li class="bj0"><a href="#">医疗器械</a><a href="#">灯具空调</a><a href="#">运输工具</a></li>
                    	<li class="bj1"><a href="#">军火烟火</a><a href="#">珠宝钟表</a><a href="#">乐　　器</a></li>
                        <li class="bj0"><a href="#">办 公 品</a><a href="#">橡胶制品</a><a href="#">皮革皮具</a></li>
                    	<li class="bj1"><a href="#">建筑材料</a><a href="#">家　　具</a><a href="#">厨房洁具</a></li>
                        <li class="bj0"><a href="#">绳网袋篷</a><a href="#">纱 线 丝</a><a href="#">布料床单</a></li>
                    	<li class="bj1"><a href="#">服装鞋帽</a><a href="#">纽扣拉链</a><a href="#">地毯席垫</a></li>
                        <li class="bj0"><a href="#">健身器材</a><a href="#">食　　品</a><a href="#">方便食品</a></li>
                    	<li class="bj1"><a href="#">饲料加工</a><a href="#">啤酒饮料</a><a href="#">酒</a></li>
                        <li class="bj0"><a href="#">烟草烟具</a><a href="#">广告销售</a><a href="#">金融物管</a></li>
                    	<li class="bj1"><a href="#">建筑修理</a><a href="#">通讯服务</a><a href="#">运输贮藏</a></li>
                        <li class="bj0"><a href="#">材料加工</a><a href="#">教育娱乐</a><a href="#">设计研究</a></li>
                    	<li class="bj1"><a href="#">餐饮住宿</a><a href="#">医疗园艺</a><a href="#">社会法律</a></li>
                    </ul>
                </div>
            </div>
            <div id="guanggao"><a href="http://view.china.alibaba.com/cms/promotion/member/net200912/index.html?tracelog=ad_index_312x96_chinanet"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/pic04.gif" width="239" height="63" /></a></div>
            <div id="guanggao"><a href="http://www.11ok.net/Contact%20.htm"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/pic05.gif" width="239" height="63" /></a></div>
      </div>
    </div>
    <div class="clr" style="height:10px"></div>
    <div id="webunder" align="left">
        <div id="lianjie">
                <div id="lianjieTitle"><span>友情链接</span><a href="#">更多>></a></div>
                <div class="clr"></div>
                <div id="lianjieNeirong"><a href="http://www.yix123.com/" target="_blank" >易翔商务网</a><a href="http://www.baidu.com/" target="_blank">百度首页</a><a href="http://www.ctmo.gov.cn/" target="_blank">国家商标局</a><a href="http://www.sipo.gov.cn/" target="_blank">国家知识产权局</a><a href="http://www.alibaba.com.cn/" target="_blank">阿里巴巴</a><a href="http://www.11ok.net/" target="_blank">中华商人网</a><a href="http://www.yix123.com.cn/" target="_blank">易翔商务空间站</a><a href="http://www.yix123.cn/" target="_blank">易翔网络部</a><a href="http://www.icris.cr.gov.hk/csci/" target="_blank">香港公司查询</a><a href="http://www.syhd.gov.cn/" target="_blank">邵阳市工商局</a><a href="http://www.hnii.gov.cn/" target="_blank">湖南信息产业厅</a><a href="http://www.sina.com.cn/" target="_blank">新浪在线</a><a href="http://www.sina.com.cn/" target="_blank">网易在线</a><a href="http://www.qq.com/" target="_blank">腾讯在线</a><a href="http://www.sy18.com/" target="_blank">邵阳信息网</a><a href="http://sy.2118.com.cn/" target="_blank">邵阳信息港</a><a href="http://www.hxonl.com/" target="_blank">湖湘网</a><a href="http://www.5460.net/" target="_blank">中国同学录</a><a href="http://www.hunantv.com/" target="_blank">金鹰网</a><a href="http://www.szol.net/" target="_blank">深圳在线</a></div>
                <div class="clr"></div>
        </div>
    </div>