<?php

class GalleryAlbums extends CActiveRecord
{
	/**
	 * The followings are the available columns in table '{{GalleryAlbums}}':
	 * @var integer $id
	 * @var integer $parentId
	 * @var integer $usersId
	 * @var integer $blogsId
	 * @var integer $status
	 * @var integer $countGallery
	 * @var string $name
	 * @var string $description
	 * @var string $settings
	 */

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
		return '{{GalleryAlbums}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('parentId, ', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>255),
			array('status, description', 'safe'),
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
                        'blog'=>array(self::BELONGS_TO,'blogs','blogsId'),
                        'user'=>array(self::BELONGS_TO,'users','usersId'),
                        'gallerys'=>array(self::HAS_MANY,'gallery','galleryAlbumsId', 'limit'=>10),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'Id',
			'parentId' => '父级ID',
			'usersId' => '用户ID',
			'blogsId' => '博客ID',
                        'status'=>'状态',
			'countGallery' => '照片数',
			'name' => '名称',
			'description' => '描述',
			'settings' => '设置',
		);
	}

        protected function beforeValidate(){
            if ($this->isNewRecord){
                $this->usersId= Yii::app()->user->id;
                $this->blogsId= Yii::app()->user->blogId;
            }
            return true;
        }

        public function getGalleryAlbumsStatus($list){
            $tmpArr= array('1'=>'发布','2'=>'隐藏');
            if (!is_null($list))
                return $tmpArr;
            else
                return $tmpArr[$this->status];
        }

        public function beforeSave(){
                $this->settings= serialize($this->settings);
        }
        
        public function afterFind(){
                $this->settings= unserialize($this->settings);
        }

        public function getGAimg(){
                $img= $this->settings['image'];
                if (!empty($img))
                        return Yii::app()->getRequest()->getBaseUrl().'/'.Yii::app()->params[uploadDir].'/'.$this->usersId.'/s/'.$img;
                else
                        return Yii::app()->getRequest()->getBaseUrl().'/images/galleryAlbums.gif';
        }
}