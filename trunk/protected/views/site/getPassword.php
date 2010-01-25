<?php $this->pageTitle=' - 找回密码' . Yii::app()->name; ?>

<h1>找回密码</h1>
<div class="okform">
        <?php echo CHtml::beginForm(); ?>
        <?php if (Yii::app()->user->getfash()): ?>
        <div><?php echo Yii::app()->user->getfash(); ?></div>
        <?php endif ?>
        <div class="simple">
        <?php echo CHtml::Label($form,'username'); ?>
        <?php echo CHtml::TextField($form,'username') ?>
        </div>
        <?php echo CHtml::submitButton('登录',array('class'=>'bottoncss')); ?></div>
<?php echo CHtml::endForm(); ?></div>
