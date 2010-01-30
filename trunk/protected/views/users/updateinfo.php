<h2>更新资料<?php echo $model->id; ?></h2>

<div class="createcss">
	<div class="actionBar">
	[<?php echo CHtml::link('查看资料',array('show','username'=>Yii::app()->user->name)); ?>]
	[<?php echo CHtml::link('编辑基本资料',array('update','username'=>Yii::app()->user->name)); ?>]
	[<?php echo CHtml::link('编辑头像',array('avatar','username'=>Yii::app()->user->name)); ?>]
	</div>

<div class="okform">
    <p>带<span class="required">*</span>的项目必须填写</p>
    <?php echo CHtml::beginForm(); ?>
    <?php echo CHtml::errorSummary($userinfo); ?>
    <div class="simple">
    <?php echo CHtml::activeLabelEx($userinfo,'position'); ?>
    <?php echo CHtml::activeTextField($userinfo,'position'); ?>
    </div>
    <div class="simple">
    <?php echo CHtml::activeLabelEx($userinfo,'address'); ?>
    <?php echo CHtml::activeTextField($userinfo,'address'); ?>
    </div>
    <div class="simple">
    <?php echo CHtml::activeLabelEx($userinfo,'native'); ?>
    <?php echo CHtml::activeTextField($userinfo,'native'); ?>
    </div>
    <div class="simple">
    <?php echo CHtml::activeLabelEx($userinfo,'url'); ?>
    <?php echo CHtml::activeTextField($userinfo,'url'); ?>
    </div>
    <div class="simple">
    <?php echo CHtml::activeLabelEx($userinfo,'hobby'); ?>
    <?php echo CHtml::activeTextField($userinfo,'hobby'); ?>
    </div>
    <div class="simple">
    <?php echo CHtml::activeLabelEx($userinfo,'tel'); ?>
    <?php echo CHtml::activeTextField($userinfo,'tel'); ?>
    </div>
    <div class="simple">
    <?php echo CHtml::activeLabelEx($userinfo,'mobilePhone'); ?>
    <?php echo CHtml::activeTextField($userinfo,'mobilePhone'); ?>
    </div>
    <div class="simple">
    <?php echo CHtml::activeLabelEx($userinfo,'qq'); ?>
    <?php echo CHtml::activeTextField($userinfo,'qq'); ?>
    </div>
    <div class="simple">
    <?php echo CHtml::activeLabelEx($userinfo,'msn'); ?>
    <?php echo CHtml::activeTextField($userinfo,'msn'); ?>
    </div>
    <div class="simple">
    <?php echo CHtml::activeLabelEx($userinfo,'about'); ?>
    <?php echo CHtml::activeTextArea($userinfo,'about',array('rows'=>8,'cols'=>60)); ?>
    </div>
    <div class="simple">
    <?php echo CHtml::label('&nbsp;', ''); ?>
    <?php echo CHtml::submitButton('更新',array('class'=>'anniubj')); ?>
    </div>
    <?php echo CHtml::endForm(); ?>
</div>
</div>