<?php

class UsersController extends DController
{
	const PAGE_SIZE=10;

	/**
	 * @var string specifies the default action to be 'list'.
	 */
	public $defaultAction='list';

	/**
	 * @var CActiveRecord the currently loaded data model instance.
	 */
	private $_model;

        
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image
			// this is used by the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xEBF4FB,
                                'minLength'=>4,
                                'maxLength'=>5,
			),
		);
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
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('update','show','avatar'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete', 'register'),
				'users'=>array('admin'),
			),
			array('deny',  // authenticated user can't register
                                'actions'=>array('register'),
				'users'=>array('@'),
			),
			array('allow',  // allow all users to perform 'list' and 'show' actions
				'actions'=>array('register', 'captcha'),
				'users'=>array('*'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Shows a particular model.
	 */
	public function actionShow()
	{
		$this->render('show',array('model'=>$this->loadUsers()));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'show' page.
	 */
        public function actionRegister()
        {
		$this->redirect('site/register');
		/**
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

		 /**/
        }

	public function actionCreate()
	{
                $model=new Users;
		if(isset($_POST['Users']))
		{
			$model->attributes=$_POST['Users'];
			if($model->save())
				$this->redirect(array('show','id'=>$model->id));
		}
		$this->render('create',array('model'=>$model));
	}


	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'show' page.
	 */
	public function actionUpdate()
	{
		$model=$this->loadUsers();
                $blogCate= BlogCategories::model()->findAll();
		if(isset($_POST['Users']))
		{
			$model->attributes=$_POST['Users'];
                        //$model->setScenario('update');
                        if (!empty($_POST['Users']['password'])){
                            $model->password= md5($model->password);
                            if ($model->save(true,array('password','email','birthday','sex','realname','compnay','blogCategoryId','province','city','area')))
                                $this->redirect(array('show','id'=>$model->id,'username'=>Yii::app()->user->name));
                        }else{
                            if ($model->save(true,array('email','birthday','sex','realname','compnay','blogCategoryId','province','city','area')))
                                $this->redirect(array('show','id'=>$model->id,'username'=>Yii::app()->user->name));
                        }
		}
		$this->render('update',array('model'=>$model,
                                             'blogCate'=>$blogCate,
                                             'userAttr'=>$model->getAttributes(),
                ));
	}

        /**
         * 更新头像
         */
        public function actionAvatar(){
            $user= $this->loadUsers();
            $saveDir= $user->getAvatarDir();
            if (isset($_FILES['Users'])){ //如果是上传文件执行这里
                 $afile= CUploadedFile::getInstance($user,'avatar');
                 if(!is_dir($saveDir))
                    mkdir($saveDir,0755);
                 $saveTmpName='avatar_tmp'.'.'.$afile->getExtensionName();
                 if($user->validate(array('avatar'))){
                     $afile->saveAs($saveDir.$saveTmpName);
                     $user->avatar= $saveTmpName;
                     $avatarSize= getimagesize($saveDir.$saveTmpName);
                     $this->render('avatar',array('user'=>$user,
                                                  'avatarSize'=>$avatarSize,
                                   ));
                 }else
                    $this->render('avatar',array('user'=>$user));
            }elseif (isset($_POST['saveAvatar']) && isset($_POST['img']['w']) && isset($_POST['img']['h'])){
		 //如果是编辑头像执行这里,有高和宽即可，如果判断x1,y1的话当他们是从图片00开始截就会判断为假了
                 $img = $_POST['img'];
                 $extName = substr($img['srcName'],-3);
                 $smallAvatar = Yii::app()->params['smallAvatar'];
                 $mediumAvatar= yii::app()->params['mediumAvatar'];
                 Yii::app()->thumb->setThumbsDirectory($user->getAvatarDir(false));
                 Yii::app()->thumb->load($user->getAvatarDir().$img['srcName']);
                 Yii::app()->thumb->crop($img['x1'],$img['y1'],$img['w'],$img['h']);
                 @unlink($user->getAvatarDir().$img['srcName']);
                 Yii::app()->thumb->save('avatar.'.$extName);
                 //Yii::app()->thumb->load($user->getAvatarDir().'avatar.'.$extName);
                 Yii::app()->thumb->resize($mediumAvatar,$mediumAvatar);
                 Yii::app()->thumb->save('mediumAvatar.'.$extName);
                 //Yii::app()->thumb->load($user->getAvatarDir().'avatar.'.$extName);
                 Yii::app()->thumb->resize($smallAvatar,$smallAvatar);
                 Yii::app()->thumb->save('smallAvatar.'.$extName);
                 $user->avatar= 'avatar.'.$extName;
                 if($user->save(false,array('avatar'))){
		     @unlink('avatar_tmp.'.$extName);
                     $this->redirect(array('show','username'=>Yii::app()->user->name));
                 }
            }elseif(!empty($user->avatar)){ //如果有头像则执行这里
                $avatarSize= getimagesize($saveDir.$user->avatar);
                $this->render('avatar',array('user'=>$user,
                                             'avatarSize'=>$avatarSize,
                              ));
            }else //没有头像默认执行这里
                $this->render('avatar',array('user'=>$user));
        }

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'list' page.
	 */
	public function actionDelete()
	{
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$this->loadUsers()->delete();
			$this->redirect(array('list'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Lists all models.
	 */
	public function actionList()
	{
		$criteria=new CDbCriteria;

		$pages=new CPagination(Users::model()->count($criteria));
		$pages->pageSize=self::PAGE_SIZE;
		$pages->applyLimit($criteria);

		$models=Users::model()->findAll($criteria);

		$this->render('list',array(
			'models'=>$models,
			'pages'=>$pages,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$this->processAdminCommand();

		$criteria=new CDbCriteria;

		$pages=new CPagination(Users::model()->count($criteria));
		$pages->pageSize=self::PAGE_SIZE;
		$pages->applyLimit($criteria);

		$sort=new CSort('Users');
		$sort->applyOrder($criteria);

		$models=Users::model()->findAll($criteria);

		$this->render('admin',array(
			'models'=>$models,
			'pages'=>$pages,
			'sort'=>$sort,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the primary key value. Defaults to null, meaning using the 'id' GET variable
	 */
	public function loadUsers($id=null)
	{
		if($this->_model===null)
		{
			if($id!==null || Yii::app()->user->id)
				$this->_model=Users::model()->findbyPk($id!==null ? $id : Yii::app()->user->id);
			if($this->_model===null)
				throw new CHttpException(404,'The requested page does not exist.');
		}
		return $this->_model;
	}

	/**
	 * Executes any command triggered on the admin page.
	 */
	protected function processAdminCommand()
	{
		if(isset($_POST['command'], $_POST['id']) && $_POST['command']==='delete')
		{
			$this->loadUsers($_POST['id'])->delete();
			// reload the current page to avoid duplicated delete actions
			$this->refresh();
		}
	}
}
