<?php

class GalleryAlbumsController extends DController
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
				'actions'=>array('create','update','delete','admin'),
				'users'=>array('@'),
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
		$this->render('show',array('model'=>$this->loadGalleryAlbums()));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'show' page.
	 */
	public function actionCreate()
	{
		$model=new GalleryAlbums;
		if(isset($_POST['GalleryAlbums']))
		{
			$model->attributes=$_POST['GalleryAlbums'];
			if($model->save())
                                $this->redirect(array('blog/galleries','gaid'=>$model->id,'username'=>$this->_user->username));
		}
		$this->render('create',array('model'=>$model));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'show' page.
	 */
	public function actionUpdate()
	{
		$model=$this->loadGalleryAlbums();
		if(isset($_POST['GalleryAlbums']))
		{
			$model->attributes=$_POST['GalleryAlbums'];
			if($model->save())
                                $this->redirect(array('blog/galleries','gaid'=>$model->id,'username'=>$this->_user->username));
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
                        if (Gallery::model()->count('galleryAlbumsId=:gaid', array(':gaid'=>$_POST['id']))==0){
                                $this->loadGalleryAlbums()->delete();
                                        $this->redirect(Yii::app()->getRequest()->getUrlReferrer());
                        }else
                                Yii::app()->DRedirect->redirect(Yii::app()->getRequest()->getUrlReferrer(),'相册不为空，请先将照片移走或删除再删除相册！',50);
		}else
                        throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Lists all models.
	 */
	public function actionList()
	{
                $this->redirect(array('blog/galleryAlbums','username'=>$this->_user->username));
                /**
		$criteria=new CDbCriteria;
		$criteria->condition= 'usersId='.Yii::app()->user->id;
		$pages=new CPagination(GalleryAlbums::model()->count($criteria));
		$pages->pageSize=self::PAGE_SIZE;
		$pages->applyLimit($criteria);

		$models=GalleryAlbums::model()->findAll($criteria);

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
                $criteria->condition= 't.usersId=:uid';
                $criteria->params= array(':uid'=>Yii::app()->user->id);
		$pages=new CPagination(GalleryAlbums::model()->count($criteria));
		$pages->pageSize=self::PAGE_SIZE;
		$pages->applyLimit($criteria);

		$sort=new CSort('GalleryAlbums');
		$sort->applyOrder($criteria);

		$models=GalleryAlbums::model()->findAll($criteria);

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
	public function loadGalleryAlbums($id=null)
	{
		if($this->_model===null)
		{
			if (!Yii::app()->user->id)
                                $this->redirect(Yii::app()->user->loginUrl);
			$this->_model=GalleryAlbums::model()->find('id=:id AND usersId=:userid',array(':id'=>$_REQUEST['id'],':userid'=>Yii::app()->user->id,));
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
			//$this->loadGalleryAlbums($_POST['id'])->delete();
			// reload the current page to avoid duplicated delete actions
			$this->refresh();
		}
	}
}
