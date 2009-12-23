<?php

class BlogController extends CController
{
	const PAGE_SIZE=10;
         /**
         * 为本控制器做初始化操作
         */
        public function init(){
                //设置本控制器使用的皮肤
                if (isset($_GET['username'])){
                        $user= Users::model()->with('blogs')->find('username=:username', array(':username'=>$_GET['username']));
                        $theme= $user->blogs->settings['theme'];
                }elseif (isset($_GET['uid'])){
                        $blog= Blogs::model()->find('usersId=:uid',array(':uid'=>intval($_GET['uid'])));
                        $theme= $blog->settings['theme'];
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
				'actions'=>array('index','articles'),
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
                $blog= Blogs::model()->with('users','articles','gallery')->find('{{blogs}}.usersId=:uid',array(':uid'=>intval($_GET['uid'])));
                $this->render('index', array('blog'=>$blog,
                                        ));
        }
        /**
         *  文章列表页
         */
        public function actionArticles(){

                $this->render('articles', array());
        }

}
