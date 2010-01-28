<div class="okform">
	<div class="createcss">
	<p>
	<strong>带 <span class="required">*</span> 项目为必填项</strong>
	</p>
	<?php echo CHtml::beginForm(); ?>
	<?php echo CHtml::errorSummary($gb); ?>

	<?php if (Yii::app()->user->isGuest): ?>
			<div class="simple">
			<?php echo CHtml::activeLabelEx($gb,'userName'); ?>
			<?php echo CHtml::activeTextField($gb, 'userName'); ?>
			</div>
			<div class="simple">
			<?php echo CHtml::activeLabelEx($gb,'userEmail'); ?>
			<?php echo CHtml::activeTextField($gb, 'userEmail'); ?>
			</div>
			<div class="simple">
			<?php echo CHtml::activeLabelEx($gb,'userUrl'); ?>
			<?php echo CHtml::activeTextField($gb, 'userUrl'); ?>
			</div>
	<?php else: ?>
			<?php echo CHtml::hiddenField('isLogin',1); ?>
	<?php endif ?>
			<div class="simple">
			<?php echo CHtml::activeLabelEx($gb,'title'); ?>
			<?php echo CHtml::activeTextField($gb, 'title'); ?>
			</div>
			<div class="simple">
			<?php echo CHtml::activeLabelEx($gb,'content'); ?>
			<?php echo CHtml::activeTextArea($gb, 'content', array('rows'=>3,'cols'=>30)); ?>
			</div>
			<?php if(!$reply): ?>
			<div class="simple">
			<?php echo CHtml::activeLabelEx($gb,'private'); ?>
			<?php echo CHtml::activeCheckBox($gb, 'private'); ?>
			</div>
			<?php endif ?>
			<div class="simple">
			<?php echo CHtml::label('&nbsp;', ''); ?>
			<?php if ($reply){echo CHtml::activeHiddenField($gb, 'parentId',array('value'=>$_GET['gbid']));} ?>
			<?php echo CHtml::submitButton($reply? '回复': '提交',array('class'=>'anniubj')); ?>
			</div>
	<?php echo CHtml::endForm(); ?>
	</div>
</div>