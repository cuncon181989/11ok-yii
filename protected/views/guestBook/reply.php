<h2>回复留言</h2>

<div class="actionBar">
[<?php echo CHtml::link('留言列表',array('blog/guestbook', 'username'=>$this->_user->username)); ?>]
[<?php echo CHtml::link('管理留言',array('admin', 'username'=>Yii::app()->user->name)); ?>]
</div>

<?php echo $this->renderPartial('_form', array(
	'gb'=>$guestbook,
	'reply'=>true,
)); ?>