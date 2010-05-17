  <div id="left">
    <div id="left_title">我的相册<span class="r"><?php if(Yii::app()->user->getState('isOwner')){echo CHtml::linkButton('删除照片',array('submit'=>array('gallery/delete','id'=>$gallery->id,'username'=>Yii::app()->user->name),'confirm'=>'确定删除?'));} ?></span></div>
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
	<div id="xiangceDetails" align="center">
		  <?php echo CHtml::image($gallery->getGalleryUrl(), $gallery->title); ?><br />
		  <?php echo CHtml::encode($gallery->title); ?>
		  <br />
	  <?php echo CHtml::link('查看原图', array($gallery->getGalleryUrl())); ?> (<?php echo round($gallery->fileSize/1024,2); ?> KB) |   上传时间：<?php echo date('Y-m-d H:i:s',$gallery->createDate) ; ?><br />
	  <?php echo CHtml::link('返回相册',array('galleries','gaid'=>$gallery->galleryAlbumsId,'username'=>$this->_user->username)); ?>
	</div>
    </div>
  </div>
<?php echo $this->renderPartial('sidebar') ?>