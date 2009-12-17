<?php

class ArticlesCategories extends CActiveRecord
{
	/**
	 * The followings are the available columns in table '{{ArticlesCategories}}':
	 * @var integer $id
	 * @var integer $blogsId
	 * @var integer $parentId
	 * @var integer $countArticles
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
		return '{{ArticlesCategories}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('usersId, blogsId, parentId, countArticles', 'numerical', 'integerOnly'=>true),
			array('name', 'required'),
			array('name', 'length','min'=>2, 'max'=>50),
			array('parentId, name, description', 'safe'),
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
                    'blogs'=>array(self::BELONGS_TO,'blogs','blogsId'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'Id',
			'usersId' => '用户id',
			'blogsId' => '博客id',
			'parentId' => '父级id',
			'countArticles' => '文章数',
			'name' => '分类名',
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
        /**
         *
         */
        protected function afterFind(){
            $this->settings  = unserialize($this->settings);
        }
        /**
         * @return true
         */
        protected function beforeSave(){
            $this->settings= serialize($this->settings);
            return true;
        }
}