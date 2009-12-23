<?php

class SiteSms extends CActiveRecord
{
	/**
	 * The followings are the available columns in table '{{SiteSms}}':
	 * @var integer $id
	 * @var integer $postId
	 * @var integer $toId
	 * @var integer $status
	 * @var string $title
	 * @var string $content
	 * @var integer $createDate
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
		return '{{SiteSms}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title, createDate', 'required'),
			array('postId, toId, status, createDate', 'numerical', 'integerOnly'=>true),
			array('title', 'length', 'max'=>255),
			array('content', 'safe'),
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
			'postId' => 'Post',
			'toId' => 'To',
			'status' => 'Status',
			'title' => 'Title',
			'content' => 'Content',
			'createDate' => 'Create Date',
		);
	}
}