<div id="registerTitle" align="left"><img src="<?php echo Yii::app()->theme->baseUrl ?>/images/icon02.gif" alt="用户注册" /></div>
<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl.'/js/pcas.js'); ?>
<?php Yii::app()->clientScript->registerCssFile(Yii::app()->theme->baseUrl.'/css/base.css') ; ?>
<div id="registerMessage01">
	<div class="okform">
		<p>
		<strong><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/icon07.gif" /> 带<span class="required">*</span>的项目必须填写</strong>
		</p>
		<div id="messageNeirong">
			<?php echo CHtml::beginForm(); ?>
			<?php echo CHtml::errorSummary($model); ?>
			<div class="simple">
			<?php echo CHtml::activeLabelEx($model,'username'); ?>
			<?php echo CHtml::activeTextField($model,'username',array('size'=>25,'maxlength'=>25)); ?>
			</div>
			<div class="simple">
			<?php echo CHtml::activeLabelEx($model,'password'); ?>
			<?php echo CHtml::activePasswordField($model,'password',array('size'=>25,'maxlength'=>32)); ?>
			</div><div class="simple">
			<?php echo CHtml::activeLabelEx($model,'password2'); ?>
			<?php echo CHtml::activePasswordField($model,'password2',array('size'=>25,'maxlength'=>32)); ?>
			</div>
			<div class="simple">
			<?php echo CHtml::activeLabelEx($model,'email'); ?>
			<?php echo CHtml::activeTextField($model,'email',array('size'=>25,'maxlength'=>50)); ?>
			</div>
			<div class="simple">
			<?php echo CHtml::activeLabelEx($model,'sex'); ?>
			<?php echo CHtml::activeDropDownList($model,'sex',$model->getUserSex('list')); ?>
			<?php echo CHtml::activeHiddenField($model,'userType',array('value'=>'1')); ?>
			</div>
			<div class="simple">
			<?php echo CHtml::activeLabelEx($model, 'blogCategoryId'); ?>
			<?php echo CHtml::activeDropDownList($model, 'blogCategoryId', CHtml::listData($blogCate, 'id', 'name')); ?>
			</div>
			<div class="simple">
			<?php echo CHtml::activeLabelEx($model,'province', array('outerText'=>'所在地区')); ?>
			<?php echo CHtml::activeDropDownList($model,'province',array()); ?>
			<?php echo CHtml::activeDropDownList($model,'city',array()); ?>
			<?php echo CHtml::activeDropDownList($model,'area',array()); ?>
			<script type="text/javascript">new PCAS("Users[province]","Users[city]","Users[area]")</script>
			</div>

			<?php if(extension_loaded('gd')): ?>
			<div class="simple">
					<?php echo CHtml::activeLabel($model,'verifyCode'); ?>
					<div>
					<?php echo CHtml::activeTextField($model,'verifyCode'); ?><br />
				<?php echo CHtml::label('&nbsp;', 'null'); ?>
					<?php $this->widget('CCaptcha',array('buttonLabel'=>'点击刷新 ','clickableImage'=>true)); ?>
					</div>
			</div>
		</div>
		<?php endif; ?>

		<div class="action">
		<?php echo CHtml::submitButton('提交',array('class'=>'anniucss01')); ?>
		</div>
		<?php echo CHtml::endForm(); ?>
	</div><!-- yiiForm -->
</div>