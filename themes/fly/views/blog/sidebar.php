  <div id="right">
	  <?php $this->renderPartial('sidebar_menu') ; ?>
	  <?php if($this->_blog->settings['isShowProfile']==1): ?>
    <div id="right_title">个人资料</div>
    <div id="right_1">
      <div id="tx"><?php echo CHtml::image($this->_user->getAvatarUrl()); ?>
		<div> <?php if (Yii::app()->user->getState('isOwner')): ?>
			  <?php echo CHtml::link('编辑资料', array('users/update','username'=>Yii::app()->user->name)); ?>
			  <?php echo CHtml::link('站内消息', array('blog/inbox','username'=>Yii::app()->user->name)); ?>
			  <?php else: ?>
			  <?php echo CHtml::link('加为好友', array('addFriend','uid'=>$this->_user->id,'username'=>$this->_user->username)); ?>
			  <?php if(!Yii::app()->user->isGuest) echo CHtml::link('悄悄话', array('addSms','uid'=>$this->_user->id, 'to'=>$this->_user->username,'username'=>Yii::app()->user->name)); ?>
			  <?php endif ?>
		</div>
	  </div>
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
      联系方式：<?php echo CHtml::encode($this->_user->userinfo->mobilePhone); ?></div><br>
	  <?php endif ?>
    <div id="right_title">我的好友</div>
    <div id="right_2">
		<?php foreach ($this->_user->friends as $key=>$friend): ?>
      <div class="Rf-friend">
		  <ul>
        <li><?php echo CHtml::link(CHtml::image($friend->getAvatarUrl('small')), array('blog/index','username'=>$friend->username)); ?></li>
        <li><?php echo CHtml::link($friend->realname, array('blog/index','username'=>$friend->username)); ?><br />
          公司：<?php echo CHtml::link($friend->realname, array('blog/index','username'=>$friend->username)); ?><br />
          网址：<?php echo CHtml::encode($friend->compnay); ?></li>
		  </ul>
        <div class="clr"></div>
      </div>
		<?php endforeach ?>
	</div>

	<div id="fangke">
	<div id="right_title">最近访客</div>
        <div id="fkNeirong">
          <ul>
			<?php foreach ($this->_user->visits as $key=>$visit): ?>
            <li><?php echo CHtml::link(CHtml::image($visit->getAvatarUrl('small')), array('blog/index','username'=>$visit->username)); ?><br />
              <?php echo CHtml::link($visit->realname, array('blog/index','username'=>$visit->username)); ?></li>
			<?php endforeach ?>
			<br>
          </ul>
        </div>
	</div>
</div>