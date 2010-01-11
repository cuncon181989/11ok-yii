<?php

class ArticlesCategoriesController extends DController
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
				'actions'=>array('admin','create','update','delete'),
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
            $this->render('show',array('model'=>$this->loadArticlesCategories()));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'show' page.
	 */
	public function actionCreate()
	{
		$model=new ArticlesCategories;
		if(isset($_POST['ArticlesCategories']))
		{
			$model->attributes=$_POST['ArticlesCategories'];
			if($model->save())
				$this->redirect(array('articlesCategories/admin','username'=>Yii::app()->user->name));
		}
		$this->render('create',array('model'=>$model));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'show' page.
	 */
	public function actionUpdate()
	{
		$model=$this->loadArticlesCategories();
		if(isset($_POST['ArticlesCategories']))
		{
			$model->attributes=$_POST['ArticlesCategories'];
			if($model->save())
				$this->redirect(array('articlesCategories/admin','username'=>Yii::app()->user->name));
		}
		$this->render('update',array('model'=>$model));
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
			$this->loadArticlesCategories()->delete();
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
                $criteria->condition= 'usersId='.Yii::app()->user->id;
		$pages=new CPagination(ArticlesCategories::model()->count($criteria));
		$pages->pageSize=self::PAGE_SIZE;
		$pages->applyLimit($criteria);

		$models=ArticlesCategories::model()->findAll($criteria);

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
		$criteria->condition= 'usersId='.Yii::app()->user->id;

		$pages=new CPagination(ArticlesCategories::model()->count($criteria));
		$pages->pageSize=self::PAGE_SIZE;
		$pages->applyLimit($criteria);

		$sort=new CSort('ArticlesCategories');
		$sort->applyOrder($criteria);

		$models=ArticlesCategories::model()->findAll($criteria);

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
	public function loadArticlesCategories($id=null)
	{
            if($this->_model===null)
            {
                if (!Yii::app()->user->id)
                    $this->redirect(Yii::app()->user->loginUrl);
                $this->_model=ArticlesCategories::model()->find('id='.($id?$id:intval($_GET['id'])).' AND usersId='.Yii::app()->user->id);
                if($this->_model===null)
                    throw new CHttpException(404,'参数错误！');
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
			if (Articles::model()->count('id='.$_POST['id'])>0)
				Yii::app()->DRedirect->redirect('admin','本分类下还有文章，不能被删除！');
			else
				$this->loadArticlesCategories($_POST['id'])->delete();
			// reload the current page to avoid duplicated delete actions
			$this->refresh();
		}
	}
}
