<div id="webMain">
    	<div id="webLeftmain">
    	  <div id="webPhoto">
       	    <div id="pBiaoti"><?php echo CHtml::link('&gt;&gt;我的相册', array('galleryAlbums','username'=>$this->_user->username), array('class'=>'dTitle')); ?>
                <span class="r"><?php if(Yii::app()->user->getState('isOwner')){echo CHtml::link('上传相片',array('gallery/upload','username'=>Yii::app()->user->name));} ?>
                      <?php if(Yii::app()->user->getState('isOwner')){echo CHtml::link('管理相片',array('gallery/admin','username'=>Yii::app()->user->name));} ?>
                </span>
            </div>
                <div id="webxiangce">
                    <ul>
                          <?php foreach ($galleries as $key=>$gallery): ?>
                            <?php if ($key==0) $this->pageTitle=$gallery->galleryAlbums->name; ?>
                          <li><?php echo CHtml::link(CHtml::image($gallery->getGalleryUrl('small'), $gallery->title), array('gallery','gid'=>$gallery->id,'username'=>$this->_user->username)); ?><br />
                              <?php echo CHtml::link(CHtml::encode($gallery->title), array('gallery','gid'=>$gallery->id,'username'=>$this->_user->username)); ?></li>
                          <?php endforeach ?>
                    </ul>
                  <div class="clr"></div>
                </div>
    	  </div>
        </div>
        <?php echo $this->renderPartial('sidebar_gallery') ?>
        <div class="clr"></div>
</div>