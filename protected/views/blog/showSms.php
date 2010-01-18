<h2>查看短信内容</h2>
<div class="actionBar">
[<?php echo CHtml::link('收件箱',array('blog/inbox','username'=>Yii::app()->user->name)); ?>]
[<?php echo CHtml::link('发件箱',array('blog/outbox','username'=>Yii::app()->user->name)); ?>]
[<?php echo CHtml::link('写信短信',array('blog/addsms','username'=>Yii::app()->user->name)); ?>]
</div>
<div class="okform">
	<div class="simple">
		<?php echo CHtml::activeLabelEx($sms, 'postId'); ?>
		<?php echo CHtml::encode($sms->post_user->username); ?>
	</div>
	<div class="simple">
		<?php echo CHtml::activeLabelEx($sms, 'toUsername'); ?>
		<?php echo CHtml::encode($sms->toUsername); ?>
	</div>
	<div class="simple">
		<?php echo CHtml::activeLabelEx($sms, 'createDate'); ?>
		<?php echo date('Y-m-d H:i:s',$sms->createDate); ?>
	</div>
	<div class="simple">
		<?php echo CHtml::activeLabelEx($sms, 'title'); ?>
		<?php echo CHtml::encode($sms->title); ?>
	</div>
	<div class="simple">
		<?php echo CHtml::activeLabelEx($sms, 'content'); ?>
		<?php echo CHtml::encode($sms->content); ?>
	</div>
</div>