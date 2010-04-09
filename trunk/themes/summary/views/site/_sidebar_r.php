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
						<div id="lianjiewenzi" align="center"><?php echo CHtml::link('加入搜商网,免费发布商情！', array('/site/register')); ?></div>
						</div>
					<?php echo CHtml::endForm(); ?>
					<?php else: ?>
						<div id="logined">
						<div id="loginedfont">欢迎您！<strong>易翔商务</strong></div>
						<div id="loginedanniu"><span class="bottoncss02"><?php echo CHtml::link('空间管理', array('blog/index','username'=>Yii::app()->user->name)); ?></span><span class="bottoncss02"><?php echo CHtml::link('退出登陆', array('site/logout')); ?></span><div class="clr"></div></div>
						<div id="lianjiewenzi" align="center"><?php echo CHtml::link('加入搜商网,免费发布商情！', array('/site/register')); ?></div>
						</div>
					<?php endif ?>
				</div>
				<div id="loginLine03"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/loginline03.gif" /></div>
		</div>
		<div id="sort">
				<div id="sortTitle"><span>行业分类</span></div>
				<div id="sortNeirong" align="center">
	  <table border="0" cellpadding="0" cellspacing="0" width="100%">
		<tr class="odd">
		<?php foreach ($this->getBlogCategory() as $key=>$blogCate): ?>
		<?php if ($key%3==0 && $key!=0): ?></tr><tr class="<?php echo $key%6?'even':'odd';?>"><?php endif ?>
			<td><?php echo CHtml::link($blogCate->name, array('site/search','bcid'=>$blogCate->id)); ?></td>
		<?php endforeach ?>
		</tr>
	  </table>
				</div>
		</div>
</div>