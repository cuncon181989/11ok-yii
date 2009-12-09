<?php

class BlogCategories extends CActiveRecord
{
	/**
	 * The followings are the available columns in table '{{BlogCategories}}':
	 * @var integer $id
	 * @var string $name
	 * @var string $description
	 * @var string $settings
	 * @var integer $countBlogs
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
		return '{{BlogCategories}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('countBlogs', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>50),
			array('description', 'length', 'max'=>255),
			array('name, description', 'safe'),
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
                    'blogs'=>array(self::HAS_MANY, 'blogs', 'blogCategoryId'),
                    'users'=>array(self::HAS_MANY,'users','blogCategoryId'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => '分类名',
			'description' => '描述',
			'settings' => '设置',
			'countBlogs' => '博客数',
		);
	}
}