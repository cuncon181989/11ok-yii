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
                if (Yii::app()->user->id>0 && Yii::app()->user->id!=$this->_user->id){
                        $visit= new Visits;
                        $visit->userId = Yii::app()->user->id;
                        $visit->visitId= $this->_user->id;
                        $visit->save();
                        //这里再设置记录已查看的标记做上面的判断条件，如果当前会话查看过就不再插入，同时应该做一个用户只能有多少的条查看数据
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

                 $this->render('addfriend', array());
         }
        /**
         * 添加悄悄话
         */
         public function actionAddSms(){

                 $this->render('addfriend', array());
         }
}