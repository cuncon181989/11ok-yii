<?php if ($_GET['username']==Yii::app()->user->name):?>
	<div id="selfMenu" style="background-color:#FFF;">
		<ul>
			<li><?php echo CHtml::link('11ok首页', '/'); ?></li>
			<li><?php echo CHtml::link('我的主页', array('blog/index','username'=>Yii::app()->user->name)); ?></li>
			<li><?php echo CHtml::link('退出登录', '/site/logout'); ?></li>
			<li><?php echo CHtml::link('修改资料', array('users/update','username'=>Yii::app()->user->name)); ?></li>
			<li><?php echo CHtml::link('修改头像', array('users/avatar','username'=>Yii::app()->user->name)); ?></li>
			<li><?php echo CHtml::link('更换皮肤', array('blogs/setTheme','username'=>Yii::app()->user->name)); ?></li>
			<li><?php echo CHtml::link('文章分类', array('articlesCategories/admin','username'=>Yii::app()->user->name)); ?></li>
			<li><?php echo CHtml::link('管理文章', array('articles/admin','username'=>Yii::app()->user->name)); ?></li>
			<li><?php echo CHtml::link('写新文章', array('articles/create','username'=>Yii::app()->user->name)); ?></li>
			<li><?php echo CHtml::link('相册分类', array('galleryAlbums/admin','username'=>Yii::app()->user->name)); ?></li>
			<li><?php echo CHtml::link('照片管理', array('gallery/admin','username'=>Yii::app()->user->name)); ?></li>
			<li><?php echo CHtml::link('上传照片', array('gallery/upload','username'=>Yii::app()->user->name)); ?></li>
			<?php if (Yii::app()->user->name== 'admin'): ?>
			<li><?php echo CHtml::link('审核人物', array('users/admin','username'=>Yii::app()->user->name)); ?></li>
			<li><?php echo CHtml::link('审核文章', array('articles/toindex','username'=>Yii::app()->user->name)); ?></li>
			<?php endif; ?>
		</ul>
	<div class="clr"></div>
	</div>
<br/>
<?php endif;?>