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
		return '{{userinfo}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('position, address, hobby', 'length', 'max'=>255),
			array('native, url, mobilePhone, msn', 'length', 'max'=>50),
                        array('url', 'url'),
                        array('msn', 'email'),
			array('tel', 'length', 'max'=>25),
			array('qq, tel', 'length', 'min'=>5, 'max'=>11),
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
                        'user'=>array(self::BELONGS_TO,'Users','usersId'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'usersId' => 'UID',
			'position' => '职位',
			'address' => '详细地址',
			'native' => '籍贯',
			'url' => '网址',
			'hobby' => '业余爱好',
			'tel' => '电话',
			'mobilePhone' => '手机',
			'qq' => 'QQ',
			'msn' => 'MSN',
			'about' => '关于自己',
		);
	}

        protected function beforeViladate(){
                if ($this->isNewRecord){
                        $this->sersId= Yii::app()->user->id;
                }
        }
}