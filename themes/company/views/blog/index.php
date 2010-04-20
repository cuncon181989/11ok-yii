<div id="webLeftmain">
	<?php if ($this->_blog->settings['isShowGQ']==1): ?>
	<div id="webLt" class="lt-title">供应与需求</div>
	<div id="webLn">
			<ul>
			<li><strong>我的供应</strong><br />
					<?php if(!empty($gongying)): ?>
							<?php foreach ($gongying as $key=>$g): ?>
							<?php echo $key+1 .'、'.CHtml::link(CHtml::encode($g->title), array('article','aid'=>$g->id,'username'=>$this->_user->username)).'<br />'; ?>
							<?php endforeach ?>
					<?php endif; ?>
			</li>
			<li><strong>我的求购</strong><br />
					<?php if(!empty($qiugou)): ?>
							<?php foreach ($qiqgou as $key=>$q): ?>
							<?php echo $key+1 .'、'.$q->title.'<br />'; ?>
							<?php endforeach ?>
					<?php endif; ?>
			</li>
		</ul>
		<div class="clr"></div>
	</div>
	<?php endif; ?>
  <div id="webLt" class="lt-title"><?php echo CHtml::link('我的相册', array('blog/galleryAlbums','username'=>$this->_user['username'])); ?></div>
	<div id="webLp02">
	  <div id="socroll_img" >
		 <div id="socroll_img1" class="socroll_content">
		  <ul>
			<?php foreach ($galleries as $key=>$gallery): ?>
			<li><?php echo CHtml::link(CHtml::image($gallery->getGalleryUrl()),array('gallery','gid'=>$gallery->id,'username'=>$this->_user->username)); ?></li>
			<?php endforeach ?>
		  </ul>
		 </div>
		 <div id="socroll_img2" class="socroll_content"></div>
	  </div>
	  <SCRIPT>
	   var speed=15
	   var socroll_img1 =  document.getElementById("socroll_img1");
	   var socroll_img2 =  document.getElementById("socroll_img2");
	   var socroll_img =  document.getElementById("socroll_img");
	   socroll_img2.innerHTML=socroll_img1.innerHTML
	   function Marquee(){
			if(socroll_img2.offsetWidth-socroll_img.scrollLeft<=0)
				socroll_img.scrollLeft-=socroll_img1.offsetWidth
			else{
				socroll_img.scrollLeft++
			}
	   }
	   var MyMar=setInterval(Marquee,speed)
	   socroll_img.onmouseover=function() {clearInterval(MyMar)}
	   socroll_img.onmouseout=function() {MyMar=setInterval(Marquee,speed)}
	  </SCRIPT>
	</div>
	<div id="webLt"  class="lt-title">
		<?php echo CHtml::link('我的文章', array('articles','username'=>$this->_user->username), array('class'=>'dTitle')); ?>
	</div>
	<div id="webLd">
		<?php foreach ($articles as $key=>$article): ?>
		<div class="Ld-all">
			<div class="Ld-title">
				<strong class="FloatLeft"><?php echo CHtml::link($article->title, array('article','aid'=>$article->id,'username'=>$this->_user->username)); ?></strong>
				<span class="FloatRight"><?php echo CHtml::link('查看全文', array('article','aid'=>$article->id,'username'=>$this->_user->username)); ?>|
									评论(<?php echo CHtml::encode($article->countComments); ?>)|<span>发表日期：<?php echo date('Y-m-d', $article->createDate); ?></span></span>
				<div class="clr"></div>
			</div>
			<div class="Ld-neirong"><?php echo CHtml::encode($article->summary); ?></div>
		</div>
		<?php endforeach; ?>
		<?php $this->widget('CLinkPager',array('pages'=>$pages)); ?>
	</div>
</div>
<?php echo $this->renderPartial('sidebar'); ?>