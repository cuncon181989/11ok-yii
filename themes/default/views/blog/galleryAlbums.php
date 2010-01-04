<div id="webMain">
    	<div id="webLeftmain">
    	  <div id="webPhoto">
       	    <div id="pBiaoti"><a href="photo.html">>>我的相册</a></div>
                <div id="webxiangce">
                	<ul>
                                <?php foreach ($galleries as $key=>$ga): ?>
                                <li><?php echo CHtml::link(CHtml::image($ga->getGAimg(), $ga->name),array('galleries','gid'=>$ga->id,'username'=>$this->_user->username)); ?>
                                        <br /><?php echo CHtml::link($ga->name,array('galleries','gid'=>$ga->id,'username'=>$this->_user->username)); ?> (<?php echo $ga->countGallery; ?>)</li>
                                <?php endforeach ?>
                        </ul>
                    <div class="clr"></div>
                </div>
    	  </div>
        </div>
        <?php echo $this->renderPartial('sidebar') ?>
        <div class="clr"></div>
</div>