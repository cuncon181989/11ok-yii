<h2>更新资料<?php echo $model->id; ?></h2>

<div class="createcss">
	<div class="actionBar">
	[<?php echo CHtml::link('用户列表',array('admin')); ?>]
	</div>

        <div class="okform">
            <p>
            带<span class="required">*</span>的项目必须填写
            </p>
            <?php Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl.'/js/pcas.js'); ?>
            <?php echo CHtml::beginForm(); ?>
            <?php echo CHtml::errorSummary($model); ?>
            <div class="simple">
            <?php echo CHtml::activeLabelEx($model,'username'); ?>
            <?php echo CHtml::activeTextField($model,'username',array('size'=>25,'maxlength'=>25,'readOnly'=>'true','disabled'=>'disabled')); ?>
            </div>
            <div class="simple">
            <?php echo CHtml::activeLabelEx($model,'password'); ?>
            <?php echo CHtml::activeTextField($model,'password',array('size'=>25,'maxlength'=>32,'value'=>'')); ?>
            </div>
            <div class="simple">
            <?php echo CHtml::activeLabelEx($model,'realname'); ?>
            <?php echo CHtml::activeTextField($model,'realname',array('size'=>25,'maxlength'=>32)); ?>
            </div>
            <div class="simple">
            <?php echo CHtml::activeLabelEx($model,'userStatus'); ?>
                <span class="normallist">
                <?php echo CHtml::activeRadioButtonList($model, 'userStatus', array('0'=>'否','1'=>'是'), array('separator'=>' ')); ?>
                </span>
            </div>
            <div class="simple">
            <?php echo CHtml::activeLabelEx($model,'top_site'); ?>
                <span class="normallist">
                <?php echo CHtml::activeRadioButtonList($model, 'top_site', array('0'=>'否','1'=>'是'), array('separator'=>' ')); ?>
                </span>
            </div>
            <div class="simple">
            <?php echo CHtml::activeLabelEx($model,'top_trade'); ?>
                <span class="normallist">
                <?php echo CHtml::activeRadioButtonList($model, 'top_trade', array('0'=>'否','1'=>'是'), array('separator'=>' ')); ?>
                </span>
            </div>
            <div class="simple">
            <?php echo CHtml::label('&nbsp;', ''); ?>
            <?php echo CHtml::submitButton($update ? '更新' : '提交',array('class'=>'anniubj')); ?>
            </div>
            <?php echo CHtml::endForm(); ?>
        </div>
</div>