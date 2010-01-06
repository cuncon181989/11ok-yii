<div id="webMain">
    	<div id="webLeftmain">
    	  <div id="webPhoto">
       	    <div id="pBiaoti">
                <?php echo CHtml::link('&gt;&gt;我的相册', array('galleryAlbums','username'=>$this->_user->username), array('class'=>'dTitle')); ?>
                <span class="r"><?php echo CHtml::link('创建相册',array('galleryAlbums/create','username'=>$this->_user->username)); ?>
                      <?php echo CHtml::link('管理相册',array('galleryAlbums/admin','username'=>$this->_user->username)); ?>
                </span>
            </div>
                <div id="webxiangce">
                	<ul>
                                <?php foreach ($galleries as $key=>$ga): ?>
                                <li><?php echo CHtml::link(CHtml::image($ga->getGAimg(), $ga->name),array('galleries','gaid'=>$ga->id,'username'=>$this->_user->username)); ?>
                                        <br /><?php echo CHtml::link($ga->name,array('galleries','gaid'=>$ga->id,'username'=>$this->_user->username)); ?> (<?php echo $ga->countGallery; ?>)</li>
                                <?php endforeach ?>
                        </ul>
                    <div class="clr"></div>
                </div>
    	  </div>
        </div>
        <?php echo $this->renderPartial('sidebar') ?>
        <div class="clr"></div>
</div>