<?php

class BlogsController extends DController
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
                                'actions'=>array('list','show','update','setTheme'),
                                'users'=>array('@'),
                        ),
                        array('allow', // allow admin user to perform 'admin' and 'delete' actions
                                'actions'=>array('admin'),
                                'users'=>array('admin'),
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
		if (empty($_GET['id'])){
			$tmpBlog= blogs::model()->find('usersId='.Yii::app()->user->id);
		}
		$this->render('show',array('model'=>$this->loadBlogs($tmpBlog->id)));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'show' page.
	 */
	public function actionCreate()
	{
		$model=new Blogs;
		if(isset($_POST['Blogs']))
		{
			$model->attributes=$_POST['Blogs'];
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
		$model=Blogs::model()->findbyPk(Yii::app()->user->blogId);
		if($model->usersId != Yii::app()->user->id)
		throw new CHttpException(404,'The requested post does not exist.');
		if(isset($_POST['Blogs']))
		{
			$model->attributes=$_POST['Blogs'];
                        $tempSet= $model->attributes['settings'];
                        $tempSet['isShowGQ']= $_POST['isShowGQ'];
                        $model->settings= $tempSet;
			if($model->save())
                                $this->redirect(array('show','id'=>$model->id,'username'=>Yii::app()->user->name));
		}
		$this->render('update',array('model'=>$model));
	}
	/**
	 * 设置
	 */
	 public function actionSetTheme(){
		$blogs= Blogs::model()->findByPk(Yii::app()->user->blogId);
		if(isset($_POST['themeSelected'])){
			$settings= $blogs->settings;
			$name= $_POST['themeSelected'];
			$settings['theme']= array(
                                                'name'=>$name,
                                                'aliasName'=>$_POST[$name]['aliasName'],
                                                'style'=>$_POST[$name]['style'],
                                                );
			$blogs->settings=$settings;
			if ($blogs->save())
				$this->refresh();
		}
		//$themesDir  = Yii::app()->getThemeManager()->getBasePath();
		$themeNames   = Yii::app()->getThemeManager()->getThemeNames();//得到所有theme
		foreach ($themeNames as $key=>$themeName){
			if ($themeName!= 'summary'){
				$theme= Yii::app()->getThemeManager()->getTheme($themeName);//得到制定的theme对象
				$themeConfig= require($theme->getBasePath().DS.'config.php');//获取指定theme中的配置文件
				$themes[$key]=$themeConfig;
				$themes[$key]['url']=$theme->getBaseUrl();
				$themes[$key]['dirName']=$themeName;
			}
		}
		$this->render('setTheme',array('blogs'=>$blogs,
						'settheme'=>$blogs->settings['theme'],
						'themes'=>$themes,
						));
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
			$this->loadBlogs()->delete();
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
		$this->redirect('/site/list');
		/**
		$criteria=new CDbCriteria;

		$pages=new CPagination(Blogs::model()->count($criteria));
		$pages->pageSize=self::PAGE_SIZE;
		$pages->applyLimit($criteria);

		$models=Blogs::model()->findAll($criteria);

		$this->render('list',array(
			'models'=>$models,
			'pages'=>$pages,
		));
		/**/
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$this->processAdminCommand();

		$criteria=new CDbCriteria;

		$pages=new CPagination(Blogs::model()->count($criteria));
		$pages->pageSize=self::PAGE_SIZE;
		$pages->applyLimit($criteria);

		$sort=new CSort('Blogs');
		$sort->applyOrder($criteria);

		$models=Blogs::model()->findAll($criteria);

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
	public function loadBlogs($id=null)
	{
		if($this->_model===null)
		{
			if($id!==null || isset($_GET['id']))
			$this->_model=Blogs::model()->findbyPk($id!==null ? $id : $_GET['id']);
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
			$this->loadBlogs($_POST['id'])->delete();
			// reload the current page to avoid duplicated delete actions
			$this->refresh();
		}
	}
}
