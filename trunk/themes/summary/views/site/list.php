<div id="webMain" align="left">
        <div id="webLeftmain">
                <div id="businessTitle"><span class="FloatLeft"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/title01.gif" alt="商人库" /></span>
                        <span class="businessfont02">
                        <?php echo CHtml::link('按时间排序', array('site/list','order'=>'time')); ?>|
                        <?php echo CHtml::link('按人气排序', array('site/list','order'=>'hot')); ?>
                        </span></div>
                <div class="clr"></div>
                <div id="businessNeirong">
                        <ul>
                                <?php foreach ($users as $key=>$user): ?>
                                <li><?php echo CHtml::link(CHtml::image($user->getAvatarUrl(), $user->realname), array('blog/index','uid'=>$user->id,'username'=>$user->username)); ?>
                                        姓名：<?php echo CHtml::link($user->realname, array('blog/index','uid'=>$user->id,'username'=>$user->username)); ?><br />
                                        公司：<?php echo CHtml::encode($user->compnay); ?><br />
                                        行业：<?php echo CHtml::encode($user->blogCategory->name); ?><br />
                                        E 家：<?php echo CHtml::encode($user->blogs->name); ?></li>
                               <?php endforeach ?>
                        </ul>
                </div>
                <div class="clr"></div>
                <div id="pagbusiness"><span class="FloatLeft"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/title03.gif" /></span>
                        <span class="pagfont"><?php $this->widget('CLinkPager',array('pages'=>$pages)); ?></span>
                        <div class="clr"></div>
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
                                <div><?php echo CHtml::link('进入自己的博客', array('blogs/index','id'=>Yii::app()->user->id,'username'=>Yii::app()->user->name)); ?></div>
                            <?php endif ?>
                        </div>
                        <div id="loginLine03"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/loginline03.gif" /></div>
                </div>
                <div id="sort">
                        <div id="sortTitle"><span>行业分类</span></div>
                        <div id="sortNeirong" align="center">
                                <ul>
                                        <li class="bj1"><a href="#">化学原料</a><a href="#">颜料油漆</a><a
                                                        href="#">日化用品</a></li>
                                        <li class="bj0"><a href="#">燃料油脂</a><a href="#">医 疗</a><a href="#">金属材料</a></li>
                                        <li class="bj1"><a href="#">机械设备</a><a href="#">手工机械</a><a
                                                        href="#">科学仪器</a></li>
                                        <li class="bj0"><a href="#">医疗器械</a><a href="#">灯具空调</a><a
                                                        href="#">运输工具</a></li>
                                        <li class="bj1"><a href="#">军火烟火</a><a href="#">珠宝钟表</a><a
                                                        href="#">乐 器</a></li>
                                        <li class="bj0"><a href="#">办 公 品</a><a href="#">橡胶制品</a><a
                                                        href="#">皮革皮具</a></li>
                                        <li class="bj1"><a href="#">建筑材料</a><a href="#">家 具</a><a href="#">厨房洁具</a></li>
                                        <li class="bj0"><a href="#">绳网袋篷</a><a href="#">纱 线 丝</a><a
                                                        href="#">布料床单</a></li>
                                        <li class="bj1"><a href="#">服装鞋帽</a><a href="#">纽扣拉链</a><a
                                                        href="#">地毯席垫</a></li>
                                        <li class="bj0"><a href="#">健身器材</a><a href="#">食 品</a><a href="#">方便食品</a></li>
                                        <li class="bj1"><a href="#">饲料加工</a><a href="#">啤酒饮料</a><a
                                                        href="#">酒</a></li>
                                        <li class="bj0"><a href="#">烟草烟具</a><a href="#">广告销售</a><a
                                                        href="#">金融物管</a></li>
                                        <li class="bj1"><a href="#">建筑修理</a><a href="#">通讯服务</a><a
                                                        href="#">运输贮藏</a></li>
                                        <li class="bj0"><a href="#">材料加工</a><a href="#">教育娱乐</a><a
                                                        href="#">设计研究</a></li>
                                        <li class="bj1"><a href="#">餐饮住宿</a><a href="#">医疗园艺</a><a
                                                        href="#">社会法律</a></li>
                                </ul>
                        </div>
                </div>
        </div>
</div>