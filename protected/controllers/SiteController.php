<?php

class SiteController extends CController
{
        const PAGE_SIZE=12;

         /**
         * 为本控制器做初始化操作
         */
        public function init(){
                //设置本控制器使用summary皮肤
                Yii::app()->setTheme('summary');
                parent::init();
        }

	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image
			// this is used by the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xEBF4FB,
			),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
                $form=new LoginForm;
		$summary= new Summary;
		$this->render('index',array('form'=>$form,
                                            'summary'=>$summary,
                                        ));
	}
        /**
         * 商人库列表
         */
        public function actionList(){
                $criteria= new CDbCriteria();
                $criteria->addCondition('userStatus=1');
                if (isset($_GET['order']))
                        $criteria->order= ($_GET['order']=='hot')? 'regDate ASC': 'regDate DESC';

                $pages= new CPagination(Users::model()->count($criteria));
                $pages->pageSize= self::PAGE_SIZE;
                $pages->applyLimit($criteria);
                
                $users= Users::model()->with('blogs','blogCategory')->findAll($criteria);
                $form=new LoginForm;
                $this->render('list', array('users'=>$users,
                                            'form'=>$form,
                                            'pages'=>$pages,
                                        ));
        }
        /**
         * 搜索
         */
        public function actionSearch(){
                        
                $criteria= new CDbCriteria;
                if (isset($_POST['search'])){
                        extract($_POST['search']);
                        if (!empty($keyword) && $keyword!='请输入关键字'){
                                $criteria->addSearchCondition('username', $keyword, true, 'OR');
                                $criteria->addSearchCondition('realname', $keyword, true, 'OR');
                                $criteria->addSearchCondition('compnay', $keyword, true, 'OR');
                        }
                        if (!empty($province))
                                $criteria->addSearchCondition('province', $province);
                        if (!empty($city))
                                $criteria->addSearchCondition('city', $city, true, 'OR');
                        if (!empty($blogCategoryId))
                                $criteria->addSearchCondition('t.blogCategoryId', $blogCategoryId);
                }
		if (!empty($_GET['bcid']))
			$criteria->addSearchCondition('t.blogCategoryId', intval($_GET['bcid']));

		$criteria->addCondition('userStatus=1 AND realname IS NOT NULL','AND');

		$pages= new CPagination(Users::model()->count($criteria));
		$pages->pageSize= self::PAGE_SIZE;
		$pages->applyLimit($criteria);

		$users= Users::model()->with('blogCategory','blogs')->findAll($criteria);

		$form=new LoginForm;
		$this->render('list', array('users'=>$users,
					    'form'=>$form,
					    'pages'=>$pages,
					));
        }

        
	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$contact=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$contact->attributes=$_POST['ContactForm'];
			if($contact->validate())
			{
				$headers="From: {$contact->email}\r\nReply-To: {$contact->email}";
				mail(Yii::app()->params['adminEmail'],$contact->subject,$contact->body,$headers);
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact',array('contact'=>$contact));
	}
	
        public function actionRegister()
        {
            $model=new Users;
            $blogs= new Blogs;
            $blogCate= BlogCategories::model()->findAll();
            //先判断第二步
            if(isset($_POST['Blogs'])){
                $model->attributes=$_POST['Users'];
                $blogs->attributes=$_POST['Blogs'];
                if ($blogs->validate()){
                   $transaction=Yii::app()->getDB()->beginTransaction();
                    try{
                        $model->password= md5($model->password);
                        $model->save();
                        $blogs->usersId= $model->id;
			$blogs->blogCategoryId= $model->blogCategoryId;
                        $blogs->save();
                        $transaction->commit();
                        $this->redirect(array('site/login'));
                    }catch(Exception $e){
                        $transaction->rollBack();
                        throw $e;
                    }
                }else{
                    $model->attributes=$_POST['Users'];
                    //$blogCate= BlogCategories::model()->findAll();
                    $this->render('register2',array('reg1user'=>$model,
                                                    'blogCate'=>$blogCate,
                                                    'blogs'=>$blogs,
                    ));
                }
            //再判断第一步
            }elseif(isset($_POST['Users'])){
                $model->attributes=$_POST['Users'];
                $model->setScenario('register');
                if ($model->validate()){
                    //$blogCate= BlogCategories::model()->findAll();
                    $blogs->blogCategoryId= $model->blogCategoryId;
                    $this->render('register2',array('reg1user'=>$model,
                                                   // 'blogCate'=>$blogCate,
                                                    'blogs'=>$blogs,
                    ));
                }else
                    $this->render('register',array('model'=>$model,
                                               'blogCate'=>$blogCate,
                ));
            }else
                //Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl.'/js/pcas.js');
                $this->render('register',array('model'=>$model,
                                               'blogCate'=>$blogCate,
                ));
        }

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		if (!Yii::app()->user->isGuest)
			$this->redirect('index');
		$form=new LoginForm;
		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$form->attributes=$_POST['LoginForm'];
			// validate user input and redirect to previous page if valid
			if($form->validate()){
                            $http1=new CHttpRequest();
                            Users::model()->updateByPk(Yii::app()->user->id,array('lastLoginIp'=>$http1->getUserHostAddress(),'lastLoginDate'=>time(),));
                            $this->redirect(Yii::app()->user->returnUrl);
                        }
		}
		// display the login form
		$this->render('login',array('form'=>$form));
	}

	/**
	 * Logout the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}

        public function getBlogCategory(){
                return BlogCategories::model()->findall();
        }
}