<div id="webMain" align="left">
        <div id="webLeftmain">
                <div id="businessTitle"><span class="FloatLeft"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/title01.gif" alt="商人库" /></span>
                        <span class="businessfont02">
                        <?php //echo CHtml::link('按时间排序', array('site/list','order'=>'time')); ?>|
                        <?php //echo CHtml::link('按人气排序', array('site/list','order'=>'hot')); ?>
                        </span></div>
                <div class="clr"></div>
                <div id="businessNeirong">
                        <ul>
                                <?php foreach ($users as $key=>$user): ?>
                                <li><?php echo CHtml::link(CHtml::image($user->getAvatarUrl(), $user->realname), array('blog/index','username'=>$user->username)); ?>
                                        姓名：<?php echo CHtml::link($user->realname, array('blog/index','username'=>$user->username)); ?><br />
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
	<?php echo $this->renderPartial('_sidebar_r',array('form'=>$form,)); ?>
</div>