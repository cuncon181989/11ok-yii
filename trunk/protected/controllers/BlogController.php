<?php

class BlogController extends CController
{
	const PAGE_SIZE=10;
         /**
         * 为本控制器做初始化操作
         */
        public $_user;
        public $_blog;
        
        public function init(){
                //设置本控制器使用的皮肤
                if (isset($_GET['username'])){
                        $user= Users::model()->with('blogs')->find('username=:username', array(':username'=>$_GET['username']));
                        $this->_user= $user->attributes;
                        $this->_blog= $user->blogs->attributes;
                        $theme= $user->blogs->settings['theme'];
                        unset($user);
                }elseif (isset($_GET['uid'])){
                        $blog= Blogs::model()->with('users')->find('usersId=:uid',array(':uid'=>intval($_GET['uid'])));
                        $this->_user= $blog->users->attributes;
                        $this->_blog= $blog->attributes;
                        $theme= $blog->settings['theme'];
                        unset($user);
                }else{
                        $theme='default';
                }
                Yii::app()->setTheme($theme);
                parent::init();
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
				'actions'=>array('index','articles','article','galleryalbums','gallery','guestbook'),
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
                $blog= Blogs::model()->find('{{blogs}}.usersId=:uid', array(':uid'=>$this->_user['id']));
                $articles= Articles::model()->findAll('blogsId=:bid ORDER BY id DESC LIMIT 6', array(':bid'=>$blog->id));
                $galleries= Gallery::model()->findAll('blogsId=:bid ORDER BY id DESC LIMIT 6', array(':bid'=>$blog->id));
                if ($this->_user['userType']==2){
                        $gongying= Articles::model()->findAll('blogsId=:bid AND globalArticlesCategoriesId=2 ORDER BY id DESC LIMIT 5', array(':bid'=>$blog->id));
                        $gongying= Articles::model()->findAll('blogsId=:bid AND globalArticlesCategoriesId=3 ORDER BY id DESC LIMIT 5', array(':bid'=>$blog->id));
                }else{
                        $gongying= array();
                        $qiqgou  = array();
                }
                $this->render('index', array('blog'=>$blog,
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

}
