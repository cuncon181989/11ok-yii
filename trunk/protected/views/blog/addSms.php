<h2>写短信</h2>
<div class="actionBar">
[<?php echo CHtml::link('收件箱',array('blog/inbox','username'=>Yii::app()->user->name)); ?>]
[<?php echo CHtml::link('发件箱',array('blog/outbox','username'=>Yii::app()->user->name)); ?>]
</div>
<div class="okform">
	<?php echo CHtml::beginForm(); ?>
	<?php echo CHtml::errorSummary($sms); ?>
	<div class="simple">
		<?php echo CHtml::activeLabel($sms, 'toUsername'); ?>
		<?php echo CHtml::activeTextField($sms, 'toUsername'); ?>
	</div>
	<div class="simple">
		<?php echo CHtml::activeLabel($sms, 'title'); ?>
		<?php echo CHtml::activeTextField($sms, 'title'); ?>
	</div>
	<div class="simple">
		<?php echo CHtml::activeLabel($sms, 'content'); ?>
		<?php echo CHtml::activeTextArea($sms, 'content',array('cols'=>30,'rows'=>5)); ?>
	</div>
	<div class="simple">
		<?php echo CHtml::Label('&nbsp;',''); ?>
		<?php echo CHtml::activeHiddenField($sms, 'toId'); ?>
		<?php echo CHtml::submitButton('发送'); ?>
	</div>
	<?php echo CHtml::endForm(); ?>
</div>