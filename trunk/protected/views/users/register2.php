<h2>用户注册：第二步</h2>

<div class="yiiForm">
    <p>
    带<span class="required">*</span>的项目必须填写
    </p>
    <?php echo CHtml::beginForm(); ?>
    <?php echo CHtml::errorSummary($blogs); ?>
    <div class="simple">
    <?php echo CHtml::activeHiddenField($reg1user,'username'); ?>
    <?php echo CHtml::activeHiddenField($reg1user,'password'); ?>
    <?php echo CHtml::activeHiddenField($reg1user,'password2'); ?>
    <?php echo CHtml::activeHiddenField($reg1user,'email'); ?>
    <?php echo CHtml::activeHiddenField($reg1user,'sex'); ?>
    <?php echo CHtml::activeHiddenField($reg1user,'userType'); ?>
    <?php echo CHtml::activeHiddenField($reg1user,'province'); ?>
    <?php echo CHtml::activeHiddenField($reg1user,'city'); ?>
    <?php echo CHtml::activeHiddenField($reg1user,'area'); ?>
    <?php echo CHtml::activeHiddenField($reg1user,'blogCategoryId'); ?>
    <?php echo CHtml::activeHiddenField($blogs,'blogCategoryId'); ?>
    </div>
    <div class="simple">
    <?php echo CHtml::activeLabelEx($blogs, 'name'); ?>
    <?php echo CHtml::activeTextField($blogs,'name'); ?>
    </div>
    <div class="simple">
    <?php echo CHtml::activeLabelEx($blogs, 'about'); ?>
    <?php echo CHtml::activeTextArea($blogs, 'about'); ?>
    </div>
    <div class="action">
    <?php echo CHtml::submitButton('提交'); ?>
    </div>

    <?php echo CHtml::endForm(); ?>

</div><!-- yiiForm -->