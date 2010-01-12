<div id="webMain">
    	<div id="webLeftmain">
                <?php if ($this->_user->userType==2): ?>
                <div id="webGongqiu">
                <ul>
                <li><strong>我的供应</strong><br />
                        <?php foreach ($gongying as $key=>$g): ?>
                        <?php echo $key+1 .'、'.$g->title.'<br />'; ?>
                        <?php endforeach ?>
                </li>
                <li><strong>我的求购</strong><br />
                        <?php foreach ($qiqgou as $key=>$q): ?>
                        <?php echo $key+1 .'、'.$q->title.'<br />'; ?>
                        <?php endforeach ?>
                </li>
                </ul>
                <div class="clr"></div>
                </div>
                <?php endif ?>
                <div id="webDiary">
                <?php echo CHtml::link('&gt;&gt;我的文章', array('articles','username'=>$this->_user->username), array('class'=>'dTitle')); ?>
                <?php foreach ($articles as $key=>$article): ?>
                <div id="dNeirong">
                        <div id="dBiaoti">
                                <span class="FloatLeft"><?php echo CHtml::link($article->title, array('article','aid'=>$article->id,'username'=>$this->_user->username)); ?></span>
                                <span class="FloatRight"><?php echo CHtml::link('查看全文', array('article','aid'=>$article->id,'username'=>$this->_user->username)); ?>|
                                        评论(<?php echo CHtml::encode($article->countComments); ?>)|<span>发表日期：<?php echo date('Y-m-d', $article->createDate); ?></span></span>
                        <div class="clr"></div>
                        </div>
                        <div id="dzhengwen">
                                <?php echo CHtml::encode($article->summary); ?>
                        </div>
                </div>
                <?php endforeach ?>
                <?php $this->widget('CLinkPager',array('pages'=>$pages)); ?>
                </div>
            <div id="webPhoto">
            	<div id="pBiaoti"><?php echo CHtml::link('&gt;&gt;我的相册', array('galleryAlbums','username'=>$this->_user->username)); ?></div>
                <div id="pzhengwen">
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
                  <SCRIPT type="text/javascript">
                        var speed=15;
                        var socroll_img1 =  document.getElementById("socroll_img1");
                        var socroll_img2 =  document.getElementById("socroll_img2");
                        var socroll_img =  document.getElementById("socroll_img");
                        socroll_img2.innerHTML=socroll_img1.innerHTML;
                        function Marquee(){
                        if(socroll_img2.offsetWidth-socroll_img.scrollLeft<=0)
                                socroll_img.scrollLeft-=socroll_img1.offsetWidth;
                        else{
                                socroll_img.scrollLeft++;
                        }
                        }
                        var MyMar=setInterval(Marquee,speed);
                        socroll_img.onmouseover=function() {clearInterval(MyMar);}
                        socroll_img.onmouseout=function() {MyMar=setInterval(Marquee,speed);}
                  </SCRIPT>
                </div>
            </div>
        </div>
        <?php echo $this->renderPartial('sidebar') ?>
        <div class="clr"></div>
    </div>