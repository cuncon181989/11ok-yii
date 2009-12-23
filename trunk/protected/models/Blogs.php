<?php

class Blogs extends CActiveRecord
{
	/**
	 * The followings are the available columns in table '{{Blogs}}':
	 * @var integer $id
	 * @var integer $usersId
	 * @var integer $blogCategoryId
	 * @var integer $countPosts
	 * @var integer $countComments
	 * @var integer $status
	 * @var string $name
	 * @var string $about
	 * @var string $settings
	 * @var string $createDate
	 * @var integer $updateDate
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
		return '{{Blogs}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name', 'required'),
			array('usersId, blogCategoryId, countPosts, countComments, status', 'numerical'),
			array('name', 'length', 'max'=>50),
			array('name,about', 'safe'),
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
                    'blogCategory'=>array(self::BELONGS_TO,'BlogCategories','blogCategoryId'),
                    'users'=>array(self::BELONGS_TO,'Users','usersId'),
                    'articlesCategory'=>array(self::HAS_MANY,'ArticlesCategories','blogId'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'Id',
			'usersId' => '用户ID',
			'blogCategoryId' => '所在行业',
			'countPosts' => '文章数',
			'countComments' => '评论数',
			'status' => '状态',
			'name' => '名称',
			'about' => '描述',
			'settings' => '设置',
			'createDate' => '创建时间',
			'updateDate' => '更新时间',
		);
	}

        protected function beforeValidate(){
            if ($this->isNewRecord){
                $this->createDate= $this->updateDate= time();
                $this->status= 1;
                $this->settings= array('theme'=>'default');
            }else
                $this->updateDate= time();
            return true;
        }
        
        protected function beforeSave(){
            $this->settings= serialize($this->settings);
            return true;
        }

        protected function afterFind(){
            $this->settings= unserialize($this->settings);
            return true;
        }

        public function getBlogStatus($list=null){
            $tmpArr= array('0'=>'未知','1'=>'正常','2'=>'用户暂停','3'=>'管理员暂停');
            if (!is_null($list))
                return $tmpArr;
            else
                return $tmpArr[$this->status];
        }
}