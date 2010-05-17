  <div id="left">
	<?php if ($this->_blog->settings['isShowGQ']==1): ?>
    <div id="left_1">
      <div id="left_xq">
        <div id="left_xqtitle">我的需求</div>
        <div id="list">
          <ul>
			<?php if(!empty($gongying)): ?>
				<?php foreach ($gongying as $key=>$g): ?>
				<li>·CHtml::link(CHtml::encode($g->title), array('article','aid'=>$g->id,'username'=>$this->_user->username))</li>
				<?php endforeach ?>
			<?php endif; ?>
          </ul>
        </div>
      </div>
      <div id="left_gy">
        <div id="left_gytitle">我的供应</div>
        <div id="list">
          <ul>
			<?php if(!empty($qiugou)): ?>
				<?php foreach ($qiugou as $key=>$q): ?>
				<li>·CHtml::link(CHtml::encode($q->title), array('article','aid'=>$q->id,'username'=>$this->_user->username))</li>
				<?php endforeach ?>
			<?php endif; ?>
          </ul>
        </div>
      </div>
    </div>
	<?php endif ?>
    <div id="left_title">我的相册</div>
    <div id="jsweb8_cn_left" style="overflow:hidden;width:720px;">
      <table cellpadding="0" cellspacing="0" border="0">
        <tr>
          <td id="jsweb8_cn_left1" valign="top" align="center"><table cellpadding="2" cellspacing="0" border="0">
            <tr align="center">
			  <?php foreach ($galleries as $key=>$gallery): ?>
              <td><?php echo CHtml::link(CHtml::image($gallery->getGalleryUrl()),array('gallery','gid'=>$gallery->id,'username'=>$this->_user->username)); ?></td>
			  <?php endforeach ?>
            </tr>
          </table></td>
          <td id="jsweb8_cn_left2" valign="top"></td>
        </tr>
      </table>
    </div>
    <script type="text/javascript">
		var speed=30
		jsweb8_cn_left2.innerHTML=jsweb8_cn_left1.innerHTML
		function Marquee3(){
		if(jsweb8_cn_left2.offsetWidth-jsweb8_cn_left.scrollLeft<=0)
		jsweb8_cn_left.scrollLeft-=jsweb8_cn_left1.offsetWidth
		else{
		jsweb8_cn_left.scrollLeft++
		}
		}
		var MyMar3=setInterval(Marquee3,speed)
		jsweb8_cn_left.onmouseover=function() {clearInterval(MyMar3)}
		jsweb8_cn_left.onmouseout=function() {MyMar3=setInterval(Marquee3,speed)}
	</script>
    <div id="left_title">我的日记</div>
    <div id="webLd" style="clear:both;">
	  <?php foreach ($articles as $key=>$article): ?>
      <div class="Ld-all">
        <div class="Ld-title"><strong class="FloatLeft"><?php echo CHtml::link($article->title, array('article','aid'=>$article->id,'username'=>$this->_user->username)); ?></strong><span class="FloatRight"><?php echo CHtml::link('查看全文', array('article','aid'=>$article->id,'username'=>$this->_user->username)); ?>|<a href="#">(<?php echo CHtml::encode($article->countComments); ?>)评论</a>|<span>发表日期：<?php echo date('Y-m-d', $article->createDate); ?></span></span>
            <div class="clr"></div>
        </div>
        <div class="Ld-neirong"><?php echo CHtml::encode($article->summary); ?></div>
      </div>
	  <?php endforeach ?>
    </div>
  </div>
<?php echo $this->renderPartial('sidebar'); ?>