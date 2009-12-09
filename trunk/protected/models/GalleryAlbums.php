<?php

class GalleryAlbums extends CActiveRecord
{
	/**
	 * The followings are the available columns in table '{{GalleryAlbums}}':
	 * @var integer $id
	 * @var integer $parentId
	 * @var integer $usersId
	 * @var integer $blogsId
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
			array('parentId, usersId, blogsId, countGallery', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>255),
			array('description, settings', 'safe'),
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
			'id' => 'Id',
			'parentId' => 'Parent',
			'usersId' => 'Users',
			'blogsId' => 'Blogs',
			'countGallery' => 'Count Gallery',
			'name' => 'Name',
			'description' => 'Description',
			'settings' => 'Settings',
		);
	}
}