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
			array('userName, content', 'required'),
			array('private, parentId, status, createDate', 'numerical', 'integerOnly'=>true),
			array('userName', 'length', 'min'=>3, 'max'=>25),
                        array('userEmail', 'email'),
                        array('userUrl', 'url'),
			array('title', 'safe'),
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
                        'user'=>array(self::BELONGS_TO,'users','usersId'),
                        'parent'=>array(self::BELONGS_TO,'GuestBook','parentId'),
                        'reply'=>array(self::HAS_MANY,'GuestBook','parentId'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'Id',
			'blogsId' => 'BID',
			'parentId' => '父级',
			'private' => '不公开',
			'usersId' => 'UID',
			'userName' => '姓名',
			'userEmail' => 'Email',
			'userUrl' => 'Url',
			'title' => '标题',
			'content' => '内容',
			'clientIp' => '发布者IP',
			'status' => '状态',
			'createDate' => '发布日期',
		);
	}
        protected function beforeValidate(){
            if($this->isNewRecord){
                $this->clientIp  = Yii::app()->getRequest()->getUserHostAddress();
                $this->createDate= time();
            }
            return true;
        }
        public function getIsPrivate(){
                $tmpArr= array('0'=>'否','1'=>'是');
                return $tmpArr[$this->private];
        }
        public function beforeDelete(){
                GuestBook::model()->deleteAll('parentId=:gbid', array(':gbid'=>$this->id));
                return true;
        }
}