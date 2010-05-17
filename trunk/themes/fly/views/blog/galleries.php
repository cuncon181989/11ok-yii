  <div id="left">
    <div id="left_title">我的相册
		<span class="r"><?php if(Yii::app()->user->getState('isOwner')){echo CHtml::link('上传相片',array('gallery/upload','username'=>Yii::app()->user->name));} ?>
		  <?php if(Yii::app()->user->getState('isOwner')){echo CHtml::link('管理相片',array('gallery/admin','username'=>Yii::app()->user->name));} ?>
		</span>
	</div>
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
		  <?php foreach ($galleries as $key=>$gallery): ?>
			<?php if ($key==0) $this->pageTitle=$gallery->galleryAlbums->name; ?>
			<li><a class="lightBox" href="<?php echo $gallery->getGalleryUrl(); ?>"><div class="photobox"><?php echo CHtml::image($gallery->getGalleryUrl('small')); ?></div></a>
			<?php echo CHtml::link(CHtml::encode($gallery->title), array('gallery','gid'=>$gallery->id,'username'=>$this->_user->username)); ?></li>
		  <?php endforeach ?>
        </ul>
        <div class="clr"></div>
		<?php $this->widget('CLinkPager',array('pages'=>$pages,'header'=>'')); ?>
      </div>
    </div>
  </div>
<?php echo $this->renderPartial('sidebar') ?>

<?php Yii::app()->clientScript->registerCoreScript('jquery'); ?>
<?php Yii::app()->clientSCript->registerScriptFile(Yii::app()->request->baseUrl.'/js/jquery.lightbox.pack.js'); ?>
<?php Yii::app()->clientScript->registerCssFile(Yii::app()->request->baseUrl.'/css/jquery.lightbox.css'); ?>
<?php Yii::app()->clientScript->registerScript("userLightbox",
	"$(function() {
		$('#webxiangce a.lightBox').lightBox({
			imageLoading: ".Yii::app()->request->baseUrl."'/images/lightbox-ico-loading.gif',
			imageBtnClose: ".Yii::app()->request->baseUrl."'/images/lightbox-btn-close.gif',
			imageBtnPrev: ".Yii::app()->request->baseUrl."'/images/lightbox-btn-prev.gif',
			imageBtnNext: ".Yii::app()->request->baseUrl."'/images/lightbox-btn-next.gif',
			txtOf: '/',
			txtImage: '图片'
		});
	});",
	CClientScript::POS_END
); ?>