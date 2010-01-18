<h2>发件箱</h2>
<div class="actionBar">
[<?php echo CHtml::link('收件箱',array('blog/inbox','username'=>Yii::app()->user->name)); ?>]
[<?php echo CHtml::link('写信短信',array('blog/addsms','username'=>Yii::app()->user->name)); ?>]
</div>

<table class="dataGrid">
	<thead>
	<tr>
		<th>序号</th>
		<th>标题</th>
		<th>接收人</th>
		<th>发送时间</th>
		<th>操作</th>
	</tr>
	</thead>
	<?php foreach ($sms as $key=>$s): ?>
	<tr class="<?php echo $n%2?'even':'odd';?>">
		<td><?php echo $key+1 ; ?></td>
		<td><?php echo CHtml::link(CHtml::encode($s->title), array('showSms','sid'=>$s->id,'username'=>Yii::app()->user->name)); ?></td>
		<td><?php echo CHtml::link(CHtml::encode($s->to_user->username),array('blog/index','username'=>$s->to_user->username)); ?></td>
		<td><?php echo date('Y-m-d H:i:s',$s->createDate); ?></td>
		<td><?php echo CHtml::linkButton('删除',array(
			  'submit'=>'',
			  'params'=>array('command'=>'delete','id'=>$s->id),
			  'confirm'=>"你真的要删除这条消息？\n #{$s->id} $s->title")); ?>
		</td>
	</tr>
	<?php endforeach ?>
</table>
<br />
<?php $this->widget('CLinkPager',array('pages'=>$pages)); ?>
