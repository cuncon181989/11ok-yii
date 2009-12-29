<?php

class BlogController extends CController
{
	const PAGE_SIZE=10;
        //存用户信息
        public $_user;
        //存blog信息
        public $_blog;

         /**
         * 为本控制器做初始化操作
         */
         public function init(){
                //先执行父级初始化
                parent::init();
                //设置本控制器使用的皮肤
                if (isset($_GET['username'])){
                        $user= Users::model()->with('blogs','userinfo')->find('username=:username', array(':username'=>$_GET['username']));
                        $this->_user= $user;
                        $this->_blog= $user->blogs;
                        $theme= $user->blogs->settings['theme'];
                }elseif (isset($_GET['uid'])){
                        $blog= Blogs::model()->with('users')->find('usersId=:uid',array(':uid'=>intval($_GET['uid'])));
                        $this->_user= $blog->users;
                        $this->_blog= $blog;
                        $theme= $blog->settings['theme'];
                }
                if (empty($theme))
                        $theme='default';
                Yii::app()->setTheme($theme);

                //插入最近查看数据
                //当当前用户大于0则是登录用户，并且不是自己，并且当前会话只记录一次！
                if (Yii::app()->user->id>0 && Yii::app()->user->id!=$this->_user->id && Yii::app()->user->getState('view'.$this->_user->id)!='1'){
                        //如果当前用户查看过此用户则更新当前用户
                        $num= Visits::model()->updateAll(array('userId'=>Yii::app()->user->id, 'visitId'=>$this->_user->id, 'visitDate'=>time()),
                                                               'userId=:uid AND visitId=:vid ORDER BY visitDate ASC LIMIT 1',
                                                               array('uid'=>Yii::app()->user->id,':vid'=>$this->_user->id)
                                                        );
                        if ($num==0){
                                $vCount= Visits::model()->count('visitId=:vid',array(':vid'=>$this->_user->id));
                                if ($vCount>=12){
                                //如果用户数大于12则刚新前面的记录
                                //否则更新最前面的一条
                                Visits::model()->updateAll(array('userId'=>Yii::app()->user->id, 'visitId'=>$this->_user->id, 'visitDate'=>time()),
                                                                 'visitId=:vid ORDER BY visitDate ASC LIMIT 1',
                                                                 array(':vid'=>$this->_user->id)
                                                           );
                                }else{
                                        //否则插入新的记录
                                        $visit= new Visits;
                                        $visit->userId = Yii::app()->user->id;
                                        $visit->visitId= $this->_user->id;
                                        $visit->save();
                                }
                        }
                        Yii::app()->user->setState('view'.$this->_user->id,'1');
                }
        }

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
		);
	}
	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
		array('allow',  // allow all users to perform 'list' and 'show' actions
				'actions'=>array('index','articles','article','galleryalbums','gallery','guestbook','addFriend','addSms'),
				'users'=>array('*'),
		),
		array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('update'),
				'users'=>array('@'),
		),
		array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('create','admin','delete'),
				'users'=>array('admin'),
		),
		array('deny',  // deny all users
				'users'=>array('*'),
		),
		);
	}
        /**
         *  博客首页
         */
        public function actionIndex(){
                Yii::app()->user->setFlash('abc','abcc');
                //$blog= Blogs::model()->find('{{blogs}}.usersId=:uid', array(':uid'=>$this->_user['id']));
                $articles= Articles::model()->findAll('blogsId=:bid AND status=1 ORDER BY id DESC LIMIT 6', array(':bid'=>$this->_blog->id));
                $galleries= Gallery::model()->findAll('blogsId=:bid AND status=1 ORDER BY id DESC LIMIT 6', array(':bid'=>$this->_blog->id));
                //$friends= Users::model()->with('friends')->findAll('{{users}}.id=:uid AND status=1', array(':uid'=>$this->_user->id));
                if ($this->_user['userType']==2){
                        $gongying= Articles::model()->findAll('blogsId=:bid AND globalArticlesCategoriesId=2 AND status=1 ORDER BY id DESC LIMIT 5', array(':bid'=>$this->_blog->id));
                        $gongying= Articles::model()->findAll('blogsId=:bid AND globalArticlesCategoriesId=3 AND status=1 ORDER BY id DESC LIMIT 5', array(':bid'=>$this->_blog->id));
                }else{
                        $gongying= array();
                        $qiqgou  = array();
                }
                $this->render('index', array(
                                             'articles'=>$articles,
                                             'galleries'=>$galleries,
                                             'gongying'=>$gongying,
                                             'qiqgou'=>$qiugou,
                                        ));
        }
        /**
         *  文章列表页
         */
        public function actionArticles(){

                $this->render('articles', array());
        }
        /**
         *  文章页
         */
        public function actionArticle(){

                $this->render('article', array());
        }
        /**
         *  相册列表页
         */
        public function actionGalleryAlbums(){

                $this->render('GalleryAlbums', array());
        }
        /**
         *  相片页
         */
        public function actionGallery(){

                $this->render('Gallery', array());
        }
        /**
         *  留言板列表页
         */
        public function actionGuestbook(){
                $this->render('Guestbook', array());
        }
        /**
         * 添加好友
         */
         public function actionAddFriend(){
                $uid= $_GET['uid'];
                if (Yii::app()->user->id==$uid)
                        Yii::app()->DRedirect->redirect(Yii::app()->getRequest()->getUrlReferrer(),'自己和自己这么熟了还要加好友？系统不允许哦^_^');
                if (Yii::app()->user->isGuest){
                        Yii::app()->user->returnUrl=$this->createUrl('addfriend',array('uid'=>$uid));
                        Yii::app()->DRedirect->redirect(array('site/login'),'需要登录才能添加好友！');
                }else{
                        if(Friends::model()->exists('userId=:uid AND friendId=:fid', array(':uid'=>Yii::app()->user->id,':fid'=>$uid))){
                                Yii::app()->DRedirect->redirect(array('blog/index','username'=>$this->_user->username),'已经在你的好友列表了！不需要重复添加^_^');
                        }else{
                                Yii::app()->DRedirect->redirect(array('blog/index','username'=>$this->_user->username),'添加成功！');
                        }
                }
         }
        /**
         * 添加悄悄话
         */
         public function actionAddSms(){

                 $this->render('addSms', array());
         }
}