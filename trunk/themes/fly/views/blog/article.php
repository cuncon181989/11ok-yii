<div id="left">
<div id="left_title"><span class="FloatLeft1">我的日记</span><span class="FloatRight1">
<?php if(Yii::app()->user->getState('isOwner')){echo CHtml::link('添加新文章', array('articles/create','username'=>$this->_user->username));} ?>
	</span></div>
	<div id="webLeftmain">
	  <div id="webDiary">
		<div class="clr" style="height:5px;"></div>
		<div id="dNeirong">
		  <div id="dBiaoti"> <strong><a href="#">给自己一个微笑</a></strong> </div>
		  <div align="right">查看(<?php echo $article->countReads; ?>) 评论(<?php echo $article->countComments; ?>) 发布日期：<?php echo date('Y-m-d H:i:s',$article->createDate); ?></div>
		  <div id="dzhengwen"><?php echo $article->artText->content; ?></div>
		</div>

		<div class="liuyan" >所有评论(<span><?php echo $article->countComments; ?>条</span>)</div>
		<div id="webmessage">
		<?php foreach ($article->comments as $key=>$comment): ?>
		  <div class="message"> <span class="FloatLeft border01">
				<?php if ($comment->usersId>0): ?>
				<?php echo CHtml::link(CHtml::image($comment->user->getAvatarUrl()),array('blog/index','username'=>$comment->user->username)); ?><br />
				<?php echo CHtml::link(CHtml::encode($comment->userName),array('blog/index','username'=>$comment->user->username)); ?>
				<?php else: ?>
				<?php echo CHtml::image(Yii::app()->getRequest()->baseUrl.'/images/guestAvatar.gif'); ?><br />
				<?php echo CHtml::encode($comment->userName); ?>
				<?php endif ?>
			  </span> <span class="FloatRight border02"><strong class="FloatLeft1"><?php echo CHtml::link(CHtml::encode($comment->title),'#',array('name'=>$comment->id)); ?></strong>
				  <strong class="FloatRight">
					<?php echo CHtml::linkButton('删除', array(
						  'submit'=>'',
						  'params'=>array('command'=>'delete','id'=>$comment->id),
						  'confirm'=>"确定删除?\n #{$comment->id} {$comment->title}")); ?>
					<?php echo date('Y-m-d H:i:s',$comment->createDate); ?></strong>
			  <div class="clr"></div>
			  <?php echo CHtml::encode($comment->content); ?>
			  </span>
			<div class="clr"></div>
		  </div>
		<?php endforeach ?>
		</div>
		<div class="liuyan">我要留言</div>
			<div class="flashMsg"><?php echo Yii::app()->user->getFlash('addcommment'); ?></div>
			<div class="okform">
				<div class="createcss">
					<?php echo CHtml::beginForm(); ?>
					<?php echo CHtml::errorSummary($commentModel); ?>
					<?php if (Yii::app()->user->isGuest): ?>
							<div class="simple">
							<?php echo CHtml::activeLabelEx($commentModel,'userName'); ?>
							<?php echo CHtml::activeTextField($commentModel, 'userName'); ?>
							</div>
							<div class="simple">
							<?php echo CHtml::activeLabelEx($commentModel,'userEmail'); ?>
							<?php echo CHtml::activeTextField($commentModel, 'userEmail'); ?>
							</div>
							<div class="simple">
							<?php echo CHtml::activeLabelEx($commentModel,'userUrl'); ?>
							<?php echo CHtml::activeTextField($commentModel, 'userUrl'); ?>
							</div>
					<?php else: ?>
							<?php echo CHtml::hiddenField('isLogin',1); ?>
					<?php endif ?>
					<div class="simple">
					<?php echo CHtml::activeHiddenField($commentModel, 'articlesId',array('value'=>$article->id)); ?>
					<?php echo CHtml::activeLabelEx($commentModel,'title'); ?>
					<?php echo CHtml::activeTextField($commentModel, 'title'); ?>
					</div>
					<div class="simple">
					<?php echo CHtml::activeLabelEx($commentModel,'content'); ?>
					<?php echo CHtml::activeTextArea($commentModel, 'content', array('rows'=>3,'cols'=>30)); ?>
					</div>
					<div class="simple">
					<?php echo CHtml::submitButton('提交',array('class'=>'anniubj')); ?>
					</div>
					<?php echo CHtml::endForm(); ?>
				</div>
			</div>
	  </div>
	</div>
</div>
<?php echo $this->renderPartial('sidebar') ?>