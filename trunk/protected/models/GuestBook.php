<?php

class GuestBook extends CActiveRecord
{
	/**
	 * The followings are the available columns in table '{{GuestBook}}':
	 * @var integer $id
	 * @var integer $blogsId
	 * @var integer $parentId
	 * @var integer $private
	 * @var integer $usersId
	 * @var string $userName
	 * @var string $userEmail
	 * @var string $userUrl
	 * @var string $title
	 * @var string $content
	 * @var string $clientIp
	 * @var integer $status
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
		return '{{GuestBook}}';
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
			array('blogsId, parentId, private, usersId, status, createDate', 'numerical', 'integerOnly'=>true),
			array('userName', 'length', 'max'=>25),
			array('userEmail, userUrl, title', 'length', 'max'=>255),
			array('clientIp', 'length', 'max'=>15),
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
			'blogsId' => 'Blogs',
			'parentId' => 'Parent',
			'private' => 'Private',
			'usersId' => 'Users',
			'userName' => 'User Name',
			'userEmail' => 'User Email',
			'userUrl' => 'User Url',
			'title' => 'Title',
			'content' => 'Content',
			'clientIp' => 'Client Ip',
			'status' => 'Status',
			'createDate' => 'Create Date',
		);
	}
}