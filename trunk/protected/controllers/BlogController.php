<?php

class BlogController extends DController
{
	const PAGE_SIZE=12;

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
				'actions'=>array('index','articles','article','galleryalbums','galleries','gallery','guestbook','addFriend','friends','addSms','inbox','outbox','showSms'),
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
                //下面是为文章分页
                $acriteria= new CDbCriteria();
                $acriteria->condition= 'blogsId=:bid AND status=1';
                $acriteria->params= array(':bid'=>$this->_blog->id);
                $acriteria->order= 'createDate DESC';
				$pages= new CPagination(Articles::model()->count($acriteria));
				$pages->pageSize=self::PAGE_SIZE;
				$pages->applyLimit($acriteria);
                
                $articles= Articles::model()->findAll($acriteria);
                $galleries= Gallery::model()->findAll('blogsId=:bid AND status=1 ORDER BY id DESC LIMIT 6', array(':bid'=>$this->_blog->id));
                if ($this->_user['userType']==2){
                        $gongying= Articles::model()->findAll('blogsId=:bid AND globalArticlesCategoriesId=2 AND status=1 ORDER BY id DESC LIMIT 5', array(':bid'=>$this->_blog->id));
                        $gongying= Articles::model()->findAll('blogsId=:bid AND globalArticlesCategoriesId=3 AND status=1 ORDER BY id DESC LIMIT 5', array(':bid'=>$this->_blog->id));
                }else{
                        $gongying= array();
                        $qiugou  = array();
                }
                $this->pageTitle= $this->_user->realname.'的e家';
                $this->render('index', array(
                                             'articles'=>$articles,
                                             'pages'=>$pages,
                                             'galleries'=>$galleries,
                                             'gongying'=>$gongying,
                                             'qiugou'=>$qiugou,
                                        ));
        }
        /**
         *  文章列表页
         */
        public function actionArticles(){
		$acid= intval($_GET['acid']);
                //下面是为文章分页
                $acriteria= new CDbCriteria();
                $acriteria->condition= 'blogsId=:bid AND status=1';
		if (!empty($acid))
			$acriteria->addCondition('articlesCategoryId='.$acid);
                $acriteria->params= array(':bid'=>$this->_blog->id);
                $acriteria->order= 'createDate DESC';
                $pages= new CPagination(Articles::model()->count($acriteria));
		$pages->pageSize=self::PAGE_SIZE * 2;//这里可以根据用户博客设置来决定显示多少
		$pages->applyLimit($acriteria);

                $articles= Articles::model()->findAll($acriteria);
		//if (null== $articles) throw new CHttpException(404,'没有文章！');
                $this->pageTitle= $this->_user->realname.'的文章列表';
                $this->render('articles', array(
                                             'articles'=>$articles,
                                             'pages'=>$pages,
                                        ));
        }
        /**
         *  文章页
         */
        public function actionArticle(){
                //添加评论
                $comment= new ArticlesComments;
                if ($_POST['ArticlesComments']){
                        $comment= new ArticlesComments;
                        $comment->attributes= $_POST['ArticlesComments'];
                        $comment->blogsId= $this->_blog->id;
                        $comment->status= 1;//这里可以根据文章或blog的设置来设置；
                        if ($_POST['isLogin']==1 && !Yii::app()->user->isGuest){
                                $comment->usersId=Yii::app()->user->id;
                                $comment->userName=Yii::app()->user->name;
                        }
                        if ($comment->save()){
                                Articles::model()->updateCounters(array('countComments'=>1), 'id=:aid', array(':aid'=>$comment->articlesId));
                                Yii::app()->user->setFlash('addcommment','添加评论成功！');
                                $this->redirect(array('article','aid'=>$comment->articlesId,'username'=>$this->_user->username,'#'=>$comment->id));
                        }
                }
                //显示文章
                $aid= intval($_GET['aid']);
                if (!$aid)
                        throw new CHttpException (404,'参数错误！文章id无效');
                $article= Articles::model()->with('artText','comments','comments.user')->findByPk($aid, 't.usersId=:uid AND t.status=1', array(':uid'=>$this->_user->id));
                if ($article==null)
                        throw new CHttpException(404);
                if (Yii::app()->user->getState('viewArt'.$aid)!=1){
                        Articles::model()->updateCounters(array('countReads'=>1), 'id=:aid', array(':aid'=>$aid));
                }
                Yii::app()->user->setState('viewArt'.$aid,1);
                $this->pageTitle= $article->title;
                $this->render('article', array('article'=>$article,
                                               'commentModel'=>$comment,
                                        ));
        }

        /**
         *  相册列表页
         */
        public function actionGalleryAlbums(){
                //下面是分页
                $acriteria= new CDbCriteria();
                $acriteria->condition= 'blogsId=:bid AND status=1';
                $acriteria->params= array(':bid'=>$this->_blog->id);
                $pages= new CPagination(Articles::model()->count($acriteria));
		$pages->pageSize= 9;//这里可以根据用户博客设置来决定显示多少
		$pages->applyLimit($acriteria);
                $galleries= GalleryAlbums::model()->findAll($acriteria);

                $this->pageTitle= $this->_user->realname.'的相册集';
                $this->render('GalleryAlbums', array(
                                             'galleries'=>$galleries,
                                             'pages'=>$pages,
                                        ));
        }
        /**
         *  相册页
         */
         public function actionGalleries(){
                $gaid= intval($_GET['gaid']);
                $acriteria= new CDbCriteria();
                $acriteria->condition= 't.blogsId=:bid AND galleryAlbumsId=:gaid AND t.status=1';
                $acriteria->params= array(':bid'=>$this->_blog->id,'gaid'=>$gaid);
                $pages= new CPagination(Gallery::model()->count($acriteria));
                $pages->pageSize= self::PAGE_SIZE *2; //这里可以根据用户博客设置来决定显示多少
                $pages->applyLimit($acriteria);

                $galleries= Gallery::model()->with('galleryAlbums')->findAll($acriteria);
                $this->render('Galleries', array('galleries'=>$galleries,
                                                 'pages'=>$pages,
                                                ));
         }
        /**
         *  相片页
         */
        public function actionGallery(){
                $gid= intval($_GET['gid']);
                $gallery= Gallery::model()->findByPk($gid, 'blogsId=:bid AND status=1', array(':bid'=>$this->_blog->id));
                if ($gallery===null)
                        throw new CHttpException(404,'没有找到可以查看的图片');
                $this->pageTitle= $gallery->title;
                $this->render('Gallery', array('gallery'=>$gallery,));
        }
        /**
         *  留言板列表页
         */
        public function actionGuestbook(){
                $gb= new GuestBook;
                //保存新发布的留言
                if (isset($_POST['GuestBook'])){
                        $gb->attributes= $_POST['GuestBook'];
                        $gb->blogsId= $this->_blog->id;
                        $gb->status= 1;//这里可以根据文章或blog的设置来设置；
                        if ($_POST['isLogin']==1 && !Yii::app()->user->isGuest){
                                $gb->usersId=Yii::app()->user->id;
                                $gb->userName=Yii::app()->user->name;
                        }
                        if ($gb->save())
                                Yii::app()->DRedirect->redirect(Yii::app()->getRequest()->getUrlReferrer(),'留言成功!');
                }else{
                        $acriteria= new CDbCriteria();
                        $acriteria->condition= 'blogsId=:bid AND status=1 AND parentId=0';
                        $acriteria->params= array(':bid'=>$this->_blog->id);
                        $acriteria->order= 'createDate DESC';
                        $pages= new CPagination(GuestBook::model()->count($acriteria));
                        $pages->pageSize=self::PAGE_SIZE;//这里可以根据用户博客设置来决定显示多少
                        $pages->applyLimit($acriteria);
                        $guestbooks= GuestBook::model()->with('user','reply')->findAll($acriteria);
                }

                $this->pageTitle= $this->_user->realname.'的留言板';
                $this->render('Guestbook', array('guestbooks'=>$guestbooks,
                                                 'gb'=>$gb,
                                                 'pages'=>$pages,
                                                ));
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
                        Yii::app()->DRedirect->redirect(array('site/login'),'需要登录才能添加好友！',3,false);
                }else{
                        if(Friends::model()->exists('userId=:uid AND friendId=:fid', array(':uid'=>Yii::app()->user->id,':fid'=>$uid))){
                                Yii::app()->DRedirect->redirect(array('blog/index','username'=>Yii::app()->user->name),'已经在你的好友列表了！不需要重复添加^_^');
                        }else{
                                $friend= new friends;
                                $friend->userId   = Yii::app()->user->id;
                                $friend->friendId = $uid;
                                $friend->status  =1;
                                $friend->save();
                                Yii::app()->DRedirect->redirect(Yii::app()->getRequest()->getUrlReferrer(),'添加成功！');
                        }
                }
         }
	 /**
	  * 好友列表
	  */
	  public function actionFriends(){
		if (Yii::app()->user->id != $this->_user->id)//可以根据用户是博客设置来决定是否任何人都能看到
			throw new CHttpException(403);
		if(isset($_POST['command'], $_POST['id']) && $_POST['command']==='delete')
		{
			Friends::model()->deleteByPk(intval($_POST['id']), 'userId=:uid', array(':uid'=>Yii::app()->user->id));
			$this->refresh();
		}

		$criteria= new CDbCriteria;
		$criteria->addCondition('status=1');
		$criteria->addCondition('userId='.Yii::app()->user->id);

		$pages= new CPagination(Friends::model()->count($criteria));
		$pages->setPageSize(10);
		$pages->applyLimit($criteria);

		 $friends= Friends::model()->with('info')->findAll($criteria);
		 $this->render('friends',array('friends'=>$friends,
						'pages'=>$pages,
						));
	  }
        /**
         * 添加站内短信(悄悄话)
         */
         public function actionAddSms(){
		if (Yii::app()->user->isGuest){
			Yii::app()->user->returnUrl= Yii::app()->getRequest()->getRequestUri();
			Yii::app()->DRedirect->redirect('/site/login','需要登录使用此功能');
		}
		if (Yii::app()->user->id != $this->_user->id)
			throw new CHttpException(403);

		$sms= new SiteSms;
		if (isset($_POST['SiteSms'])){
			$sms2=new SiteSms;
			$toUser= Users::model()->find('username=:uname', array('uname'=>$_POST['SiteSms']['toUsername']));
			$sms2->attributes= $sms->attributes= $_POST['SiteSms'];
			$sms2->toId= $sms->toId= $toUser->id;
			$sms->ownerId= Yii::app()->user->id;
			$sms2->ownerId= $toUser->id;
			if ($sms->save()){
				$sms2->save();
				Yii::app()->DRedirect->redirect(array('blog/index','username'=>Yii::app()->user->name),'消息发送成功！');
			}
		}else{
			$sms->toUsername= $_GET['to'];
		}
		$this->render('addSms', array('sms'=>$sms,
					));
         }
	 /**
	  * 收件箱
	  */
	 public function actionInBox(){
		$this->processDelete();

		 $criteria= new CDbCriteria;
		 $criteria->addCondition('toId='.Yii::app()->user->id);
		 $criteria->addCondition('ownerId='.Yii::app()->user->id);

		 $pages= new CPagination(SiteSms::model()->count($criteria));
		 $pages->setPageSize(10);
		 $pages->applyLimit($criteria);

		 $sms= SiteSms::model()->with('post_user')->findAll($criteria);
		 $this->render('inbox',array('sms'=>$sms,
					'pages'=>$pages,
					));
	 }
	 /**
	  * 发件箱
	  */
	 public function actionOutBox(){
		$this->processDelete();
		 
		 $criteria= new CDbCriteria;
		 $criteria->addCondition('postId='.Yii::app()->user->id);
		 $criteria->addCondition('ownerId='.Yii::app()->user->id);

		 $pages= new CPagination(SiteSms::model()->count($criteria));
		 $pages->setPageSize(10);
		 $pages->applyLimit($criteria);

		 $sms= SiteSms::model()->with('to_user')->findAll($criteria);
		 $this->render('outbox',array('sms'=>$sms,
					'pages'=>$pages,
					));
	 }
	 /**
	  * 查看sms内容
	  */
	  public function actionShowSms(){
		  if (isset($_GET['sid'])){
			$sid= intval($_GET['sid']);
			$sms= SiteSms::model()->with('post_user')->findByPk($sid,'ownerId=:uid',array(':uid'=>Yii::app()->user->id));
			if ($sms===null)
				throw new CHttpException(404);
			$this->render('showSms',array('sms'=>$sms));
		  }else
			throw new CHttpException(404);
	  }
	  /**
	   * 处理删除请求
	   */
	  protected function processDelete(){
		if(isset($_POST['command'], $_POST['id']) && $_POST['command']==='delete')
		{
			SiteSms::model()->deleteByPk(intval($_POST['id']), 'ownerId=:oid', array(':oid'=>Yii::app()->user->id));
			$this->refresh();
		}
	  }
}