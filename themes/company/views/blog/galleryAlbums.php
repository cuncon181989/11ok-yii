<div id="webLeftmain">
	<div id="webLt"  class="lt-title">
			<?php echo CHtml::link('我的相册', array('galleryAlbums','username'=>$this->_user->username), array('class'=>'dTitle')); ?>
			<span class="FloatRight"><?php if(Yii::app()->user->getState('isOwner')){echo CHtml::link('创建相册',array('galleryAlbums/create','username'=>Yii::app()->user->name));} ?>
				  <?php if(Yii::app()->user->getState('isOwner')){echo CHtml::link('管理相册',array('galleryAlbums/admin','username'=>Yii::app()->user->name));} ?>
			</span>
	</div>
	<div id="webxiangce">
		<div class="clr" style="height:10px"></div>
		<ul>
		<?php foreach ($galleries as $key=>$ga): ?>
			<li><?php echo CHtml::link(CHtml::image($ga->getGAimg(), $ga->name),array('galleries','gaid'=>$ga->id,'username'=>$this->_user->username)); ?><br />
			<?php echo CHtml::link($ga->name,array('galleries','gaid'=>$ga->id,'username'=>$this->_user->username)); ?> (<?php echo $ga->countGallery; ?>)</li>
		<?php endforeach ?>
		</ul>
	  <div class="clr"></div>
	</div>
</div>
<?php echo $this->renderPartial('sidebar_gallery') ?>