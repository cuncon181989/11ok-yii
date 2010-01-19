<h2>详细设置</h2>

<div class="actionBar">
[<?php echo CHtml::link('查看列表',array('show','username'=>Yii::app()->user->name)); ?>]
[<?php echo CHtml::link('基本设置',array('update','username'=>Yii::app()->user->name)); ?>]
</div>

<div class="okform">
<?php echo CHtml::beginForm(); ?>
<ul class="theme_list">
<?php foreach($themes as $key=>$theme): ?>
	<li>
		<?php echo CHtml::image($theme['url'].$theme['screenShot']); ?><br>
		<?php echo CHtml::radioButton('themeSelected', $blogs->settings['theme']['name'],array('value'=>$theme['dirName'],'id'=>'theme_'.$key)); ?>
		<?php echo CHtml::hiddenField($theme['dirName'].'[aliasName]', $theme['aliasName']); ?>
		<?php echo CHtml::label($theme['aliasName'], 'theme_'.$key); ?>
		<div class="style_list" <?php if ($blogs->settings['theme']['name']!= $theme['dirName']) echo 'style="display:none;"'; ?>>
			<?php echo CHtml::radioButtonList($theme['dirName'].'[style]', $blogs->settings['theme']['style'], $theme['styles'],array('separator'=>'')); ?>
		</div>
	</li>
<?php endforeach ?>
</ul>
<div class="action">
<?php echo CHtml::submitButton('保存'); ?>
</div>

<?php echo CHtml::endForm(); ?>
</div>
<?php Yii::app()->clientScript->registerCoreScript('jquery'); ?>
<script type="text/javascript">
	jQuery(function(){
		$("input[name='themeSelected']").click(function(){
			$(".style_list").hide();
			$(this).next().next('.style_list').show();
		});
	});
</script>