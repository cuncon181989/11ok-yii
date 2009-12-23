<?php

class UserInfo extends CActiveRecord
{
	/**
	 * The followings are the available columns in table '{{UserInfo}}':
	 * @var integer $usersId
	 * @var string $position
	 * @var string $address
	 * @var string $native
	 * @var string $url
	 * @var string $hobby
	 * @var string $tel
	 * @var string $mobilePhone
	 * @var string $qq
	 * @var string $msn
	 * @var string $about
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
		return '{{UserInfo}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('usersId', 'required'),
			array('usersId', 'numerical', 'integerOnly'=>true),
			array('position, address, hobby, msn', 'length', 'max'=>255),
			array('native, url, mobilePhone', 'length', 'max'=>50),
			array('tel', 'length', 'max'=>25),
			array('qq', 'length', 'max'=>11),
			array('about', 'safe'),
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
			'usersId' => 'Users',
			'position' => 'Position',
			'address' => 'Address',
			'native' => 'Native',
			'url' => 'Url',
			'hobby' => 'Hobby',
			'tel' => 'Tel',
			'mobilePhone' => 'Mobile Phone',
			'qq' => 'Qq',
			'msn' => 'Msn',
			'about' => 'About',
		);
	}
}