<?php

class GalleryController extends DController
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
				'actions'=>array('uploadFiles'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('list','show','create','update','upload'),
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
         * 上传的几步操作
         */
	public function actionUpload()
	{
            @session_start();
            if (isset($_POST['upload_save'])){
                //是编辑上传文件后的保存.
                $gallery= new Gallery;
                $dbTrans= $gallery->getDbConnection()->beginTransaction();
                try{
                        foreach ($_POST as $id => $info) {
                                if(is_array($info)){
                                        gallery::model()->updateByPk($info['id'], array('title'=>$info['title'],'description'=>$info['description']));
                                }
                        }
                        $dbTrans->commit();
                        unset($_SESSION['uploadFiles']);
                        unset($_SESSION['uploadFinish']);
                        $this->redirect(array('gallery/list'));
                }catch (Exception $e){
                        $dbTrans->rollback();
                        $this->redirect(array('upload'));
                }
            }elseif($_SESSION['uploadFinish']==true){
                //如果上传完毕则显示编辑界面
                $this->render('upload_save',array('files'=>$_SESSION['uploadFiles']));
            }elseif (isset($_POST['upload_step1'])){
                //是第一步提交则显示第二步
                $this->render('upload_step2', array('ga'=>$_POST['Gallery']['galleryAlbumsId'],
                                                    'gs'=>$_POST['Gallery']['status'],
                ));
            }else{
                //开始上传
                $model=new Gallery;
                $ga= GalleryAlbums::model()->findAll('usersId='.Yii::app()->user->id);
                $this->render('upload_step1',array('model'=>$model,'ga'=>$ga,));
            }
	}
        /**
         * 上传文件的保存
         */
        public function actionUploadFiles()
        {       
            if(isset($_POST['PHPSESSID'])){
                    Yii::app()->session->sessionID = $_POST['PHPSESSID'];
                    Yii::app()->session->init();
            }
            if(isset($_POST['ga'])){
                $gallery= new Gallery;
                $saveDir= $gallery->getGalleryDir();
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
                        @Yii::log(Yii::app()->user->name.' 上传照片:'.$saveDir.$saveFileName);
                        $gallery->galleryAlbumsId= intval($_POST['ga']);
                        $gallery->status= intval($_POST['gs']);
                        $gallery->title = $ufile->getName(); //$_POST['Filename']
                        $gallery->fileName= $saveFileName;
                        $gallery->fileType= $ufile->getExtensionName();
                        $gallery->fileSize= $ufile->getSize();
                        $gallery->settings= array();
                        if ($gallery->save()){
                                @session_start();
                                @$_SESSION['uploadFiles'][]= $gallery;
                                if($_REQUEST['isComplete']==1){
                                        @$_SESSION['uploadFinish']=true;
                                }
                        }else{
                                unlink($saveDir.$saveFileName);
                                unlink($saveDir.'s'.DS.$saveFileName);
                                exit($_POST['Filename'].'文件保存出错!');
                        }
                }
            }else
                throw new CHttpException(404);
        }
	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'show' page.
	 */
	public function actionUpdate()
	{
		$gallery=$this->loadGallery();
                $ga= GalleryAlbums::model()->findAll('usersId='.Yii::app()->user->id);
		if(isset($_POST['Gallery']))
		{
			$gallery->attributes=$_POST['Gallery'];
			if($gallery->save())
				$this->redirect(array('show','id'=>$gallery->id));
		}
		$this->render('update',array('gallery'=>$gallery,
                                             'ga'=>$ga,
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
                $criteria->addCondition('usersId='.Yii::app()->user->id);
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
			if($id!==null || $_GET['id'])
				$this->_model=Gallery::model()->findbyPk($id? $id: $_GET['id'],'usersId=:uid',array(':uid'=>Yii::app()->user->id));
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
