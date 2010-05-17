  <div id="left">
    <div id="left_title">我的相册</div>
    <div class="photo">
      <div id="photo_left">
      <ul>
		<?php if(count($this->_user->articlesCategory)>0): ?>
		<?php foreach ($this->_user->galleryAlbums as $key=>$ga): ?>
			<li><?php echo CHtml::link(CHtml::encode($ga->name),array('galleries','gaid'=>$ga->id,'username'=>$this->_user->username)); ?></li>
		<?php endforeach ?>
		<?php endif; ?>
      </ul>
      </div>
      <div id="webxiangce">
        <ul>
		<?php foreach ($galleries as $key=>$ga): ?>
			<li><?php echo CHtml::link(CHtml::image($ga->getGAimg(), $ga->name),array('galleries','gaid'=>$ga->id,'username'=>$this->_user->username)); ?><br />
			<?php echo CHtml::link($ga->name,array('galleries','gaid'=>$ga->id,'username'=>$this->_user->username)); ?> (<?php echo $ga->countGallery; ?>)</li>
		<?php endforeach ?>
        </ul>
        <div class="clr"></div>
      </div>
    </div>
  </div>
<?php echo $this->renderPartial('sidebar') ?>