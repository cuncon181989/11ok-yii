<?php

class GalleryController extends CController
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
			array('allow',  // allow all users to perform 'list' and 'show' actions
				'actions'=>array('list','show','uploadFiles'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','upload'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
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
		$this->render('show',array('model'=>$this->loadGallery()));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'show' page.
	 */
	public function actionCreate()
	{
		$model=new Gallery;
                $ga= GalleryAlbums::model()->findAll('usersId='.Yii::app()->user->id);
		if(isset($_POST['Gallery']))
		{
                    mydebug($_POST,0,'var_dump');
                    mydebug($_FILES);
			$model->attributes=$_POST['Gallery'];
			if($model->save())
				$this->redirect(array('show','id'=>$model->id));
		}
		$this->render('create',array('model'=>$model,
                                             'ga'=>$ga,
                ));
	}
	public function actionUpload()
	{
            $model=new Gallery;
            if (isset($_POST['upload_step1'])){
                $this->render('upload_step2', array('ga'=>$_POST['Gallery']['galleryAlbumsId'],
                                                    'gs'=>$_POST['Gallery']['status'],
                ));
            }else{
                $ga= GalleryAlbums::model()->findAll('usersId='.Yii::app()->user->id);
                $this->render('upload_step1',array('model'=>$model,'ga'=>$ga,));
            }
	}
        public function actionUploadFiles()
        {
            //Yii::app()->session->sessionID = $_POST['PHPSESSID'];
            //Yii::app()->session->init();
            $gallery= new Gallery;
            $saveDir= $gallery->getGalleryDir();
            if(isset($_FILES)){
                if(!is_dir($saveDir))
                    mkdir($saveDir,0644);
                if(!is_dir($saveDir.DS.'s'))
                    mkdir($saveDir.DS.'s',0644);
                $ufile= CUploadedFile::getInstanceByName('gallery');
                $saveFileName= date('YmdHis',time()).rand(100,999).'.'.$ufile->getExtensionName();
                if ($ufile->saveAs($saveDir.$saveFileName)){
                        $reWidth = Yii::app()->params['galleryWidth'];
                        $reHeight= Yii::app()->params['galleryHeight'];
                        $sWidth  = Yii::app()->params['gallerySWidth'];
                        $sHeight = Yii::app()->params['gallerySHeight'];
                        Yii::app()->thumb->setThumbsDirectory($gallery->getGalleryDir(false));
                        Yii::app()->thumb->load($saveDir.$saveFileName);
                        Yii::app()->thumb->resize($reWidth,$reHeight);//大图缩小
                        Yii::app()->thumb->save($saveFileName);
                        Yii::app()->thumb->resize($sWidth,$sHeight);//生成缩略图
                        Yii::app()->thumb->save('s'.DS.$saveFileName);
                        @Yii::log(Yii::app()->user->name.' uploadGallery:'.$saveDir.$saveFileName);
                        $gallery->galleryAlbumsId= intval($_POST['ga']);
                        $gallery->status= intval($_POST['gs']);
                        $gallery->title = $_POST['Filename'];
                        $gallery->fileName= $saveFileName;
                        $gallery->fileType= $ufile->getExtensionName();
                        $gallery->fileSize= $ufile->getSize();
                        $gallery->settings= array();
                        if ($gallery->save()){
                                echo '1';//正确则要想办法判断所有文件是否上传完毕，完毕则显示写描述的页面。
                        }else{
                                //这里做删除文件并报错！
                        }
                }
            }else
                throw new CHttpException(404,'no file');
        }
	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'show' page.
	 */
	public function actionUpdate()
	{
		$model=$this->loadGallery();
		if(isset($_POST['Gallery']))
		{
			$model->attributes=$_POST['Gallery'];
			if($model->save())
				$this->redirect(array('show','id'=>$model->id));
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
			$this->loadGallery()->delete();
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

		$pages=new CPagination(Gallery::model()->count($criteria));
		$pages->pageSize=self::PAGE_SIZE;
		$pages->applyLimit($criteria);

		$models=Gallery::model()->findAll($criteria);

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

		$pages=new CPagination(Gallery::model()->count($criteria));
		$pages->pageSize=self::PAGE_SIZE;
		$pages->applyLimit($criteria);

		$sort=new CSort('Gallery');
		$sort->applyOrder($criteria);

		$models=Gallery::model()->findAll($criteria);

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
	public function loadGallery($id=null)
	{
		if($this->_model===null)
		{
			if($id!==null || isset($_GET['id']))
				$this->_model=Gallery::model()->findbyPk($id!==null ? $id : $_GET['id']);
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
			$this->loadGallery($_POST['id'])->delete();
			// reload the current page to avoid duplicated delete actions
			$this->refresh();
		}
	}
}
