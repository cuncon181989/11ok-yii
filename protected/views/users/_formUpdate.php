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
    <?php echo CHtml::activePasswordField($model,'password',array('size'=>25,'maxlength'=>32,'value'=>'')); ?>
    </div><div class="simple">
    <?php echo CHtml::activeLabelEx($model,'password2'); ?>
    <?php echo CHtml::activePasswordField($model,'password2',array('size'=>25,'maxlength'=>32)); ?>
    </div>
    <div class="simple">
    <?php echo CHtml::activeLabelEx($model,'realname'); ?>
    <?php echo CHtml::activeTextField($model,'realname',array('size'=>25,'maxlength'=>12)); ?>
    </div>
    <div class="simple">
    <?php echo CHtml::activeLabelEx($model,'compnay'); ?>
    <?php echo CHtml::activeTextField($model,'compnay',array('size'=>25,'maxlength'=>50)); ?>
    </div>
    <div class="simple">
    <?php echo CHtml::activeLabelEx($model,'email'); ?>
    <?php echo CHtml::activeTextField($model,'email',array('size'=>25,'maxlength'=>50)); ?>
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
    <?php $userAttr= $model->getAttributes();?>
    <script type="text/javascript">new PCAS("Users[province]","Users[city]","Users[area]","<?php echo $userAttr['province']; ?>","<?php echo $userAttr['city']; ?>","<?php echo $userAttr['area']; ?>")</script>
    </div>
    <div class="simple">
    <?php echo CHtml::activeLabelEx($model,'sex'); ?>
    <?php echo CHtml::activeDropDownList($model,'sex',$model->getUserSex('list')); ?>
    <?php echo CHtml::activeHiddenField($model,'userType',array('value'=>'1')); ?>
    </div>
    <div class="simple">
    <?php echo CHtml::activeLabelEx($model,'birthday'); ?>
    <?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                    'model'=>$model,
                    'attribute'=>'birthday',
                    'language'=>'zh_cn',
                    'options'=>array(
                        'showAnim'=>'fold',
                        'changeYear'=>true,
                        'changeMonth'=>true,
                        'dateFormat'=>'yy-mm-dd',
                        'yearRange'=>'1949:'.date('Y',time()),
                    ),
                    'htmlOptions'=>array(
                        'readonly'=>true,
                    ),
                ));
    ?>
    </div>
    <div class="action">
    <?php echo CHtml::submitButton($update ? '更新' : '提交',array('class'=>'anniubj')); ?>
    </div>
    <?php echo CHtml::endForm(); ?>
</div><!-- yiiForm -->