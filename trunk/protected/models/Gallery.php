<?php

class Gallery extends CActiveRecord
{
	/**
	 * The followings are the available columns in table '{{Gallery}}':
	 * @var integer $id
	 * @var integer $galleryAlbumsId
	 * @var integer $usersId
	 * @var integer $blogsId
	 * @var integer $countReads
	 * @var integer $countComments
	 * @var string $title
	 * @var string $description
	 * @var string $filePath
	 * @var string $fileName
	 * @var string $fileType
	 * @var integer $fileSize
	 * @var string $metaData
	 * @var string $settings
	 * @var integer $createDate
	 */
         public $oldGACate;
	/**
	 * Returns the static model of the specified AR class.
	 * @return CActiveRecord the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{Gallery}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('galleryAlbumsId, usersId, blogsId, ', 'required'),
			array('galleryAlbumsId, usersId, blogsId, status, countReads, countComments, fileSize, createDate', 'numerical', 'integerOnly'=>true),
			array('title', 'length', 'max'=>50),
			array('filePath, fileName', 'length', 'max'=>255),
			array('fileType', 'length', 'max'=>25),
			array('status, title, description, metaData, settings', 'safe'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'galleryAlbumsId' => '相册ID',
			'usersId' => '用户ID',
			'blogsId' => '博客ID',
			'status' => '状态',
			'countReads' => '查看数',
			'countComments' => '评论数',
			'title' => '标题',
			'description' => '描述',
			'fileName' => '文件名',
			'filePath' => '路径',
			'fileType' => '类型',
			'fileSize' => '大小',
			'metaData' => 'Meta数据',
			'settings' => '设置',
			'createDate' => '上传时间',
		);
	}

        public function getGalleryStatus($list){
            $tmpArr= array('1'=>'发布', '2'=>'隐藏');
            if (!is_null($list))
                return $tmpArr;
            else
                return $tmpArr[$this->status];
        }

        protected function beforeValidate(){
            if($this->isNewRecord){
                $this->createDate= time();
                $this->usersId= Yii::app()->user->id;
                $this->blogsId= Yii::app()->user->blogId;
            }
            return true;
        }
        /**
         * 记录一下是否更改了类别便于保存前更新相应类别的统计
         */
        protected function afterFind(){
            $this->oldGACate = $this->galleryAlbumsId;
        }
        /**
         * 这里更新一下文章分类和全局文章分类的统计
         * @return true
         */
        protected function beforeSave(){
            if ($this->isNewRecord){
                $this->dbConnection->createCommand('update {{galleryalbums}} set countGallery=countGallery+1 WHERE id='.$this->galleryAlbumsId)->execute();
            }elseif ($this->oldGACate!=$this->galleryAlbumsId){
                $this->dbConnection->createCommand('update {{galleryalbums}} set countArticles=galleryalbums+1 WHERE id='.$this->galleryAlbumsId)->execute();
                $this->dbConnection->createCommand('update {{galleryalbums}} set countArticles=galleryalbums-1 WHERE id='.$this->oldGACate)->execute();
            }
            return true;
        }

}