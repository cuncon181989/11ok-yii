<?php

class Friends extends CActiveRecord
{
	/**
	 * The followings are the available columns in table '{{Friends}}':
	 * @var integer $id
	 * @var integer $userId
	 * @var integer $friendId
	 * @var integer $status
	 * @var string $message
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
		return '{{Friends}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('createDate', 'required'),
			array('userId, friendId, status, createDate', 'numerical', 'integerOnly'=>true),
			array('message', 'length', 'max'=>255),
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
			'userId' => 'User',
			'friendId' => 'Friend',
			'status' => 'Status',
			'message' => 'Message',
			'createDate' => 'Create Date',
		);
	}
}