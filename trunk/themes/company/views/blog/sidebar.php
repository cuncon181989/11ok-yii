    <div id="webRightmain">
		<?php $this->renderPartial('sidebar_menu') ; ?>
        <div id="webRt" class="Rt-title"><a href="about.html">个人资料</a></div>
        <div id="webRa">
		<div id="Ra-touxiang" align="center">
			<?php echo CHtml::image($this->_user->getAvatarUrl()); ?><br />
			<div> <?php if (Yii::app()->user->getState('isOwner')): ?>
				  <?php echo CHtml::link('编辑资料', array('users/update','username'=>Yii::app()->user->name)); ?>
				  <?php echo CHtml::link('站内消息', array('blog/inbox','username'=>Yii::app()->user->name)); ?>
				  <?php else: ?>
				  <?php echo CHtml::link('加为好友', array('addFriend','uid'=>$this->_user->id,'username'=>$this->_user->username)); ?>
				  <?php if(!Yii::app()->user->isGuest) echo CHtml::link('悄悄话', array('addSms','uid'=>$this->_user->id, 'to'=>$this->_user->username,'username'=>Yii::app()->user->name)); ?>
				  <?php endif ?>
			</div>
		</div>
            <div class="Ra-ziliao">
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
      <div id="webRt" class="Rt-title"><?php if(Yii::app()->user->getState('isOwner')) echo CHtml::link('我的好友',array('blog/friends','username'=>$this->_user->username)); ?></div>
      <div id="webRf">
		<?php foreach ($this->_user->friends as $key=>$friend): ?>
        <div class="Rf-friend">
			<?php echo CHtml::link(CHtml::image($friend->getAvatarUrl('small')), array('blog/index','username'=>$friend->username)); ?>
			姓名：<?php echo CHtml::link($friend->realname, array('blog/index','username'=>$friend->username)); ?><br />
			公司：<?php echo CHtml::encode($friend->compnay); ?><br />
			<div class="clr"></div>
        </div>
		<?php endforeach; ?>
      </div>
      <div id="fangke">
        <div id="fkTitle">最近访客</div>
        <div id="fkNeirong">
			<ul>
            <?php foreach ($this->_user->visits as $key=>$visit): ?>
                    <li><?php echo CHtml::link(CHtml::image($visit->getAvatarUrl('small')), array('blog/index','username'=>$visit->username)); ?><br />
                        <?php echo CHtml::link($visit->realname, array('blog/index','username'=>$visit->username)); ?></li>
            <?php endforeach ?>
            </ul>
        </div>
      </div>
</div>