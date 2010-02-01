        <div id="webRightmain">
        	<div id="webKuang">
            	<div id="kTitle"><a href="#">分类</a></div>
                <div id="aNeirong">
			<ul id="webphotolist">
			<?php foreach ($this->_user->galleryAlbums as $key=>$ga): ?>
				<li><?php echo CHtml::link(CHtml::encode($ga->name),array('galleries','gaid'=>$ga->id,'username'=>$this->_user->username)); ?></li>
			<?php endforeach ?>
			</ul>
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
                                <?php echo CHtml::link($visit->realname,  array('blog/index','username'=>$visit->username)); ?></li>
                    <?php endforeach ?>
                    </ul>
                    <div class="clr"></div>
                </div>
                </div>
        </div>