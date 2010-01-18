<?php

class SiteSms extends CActiveRecord
{
	/**
	 * The followings are the available columns in table '{{SiteSms}}':
	 * @var integer $id
	 * @var integer $postId
	 * @var integer $toId
	 * @var integer $toUsername
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
			array('toUsername, title, content', 'required'),
			array('title, toUsername', 'length','min'=>2, 'max'=>255),
			array('toUsername', 'exist', 'allowEmpty'=>false, 'className'=>'users','attributeName'=>'username','message'=>'接收者用户不存在'),
			array('postId, toId, status, createDate', 'numerical', 'integerOnly'=>true),
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
			'to_user'=>array(self::BELONGS_TO,'users','toId'),
			'post_user'=>array(self::BELONGS_TO,'users','postId'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'Id',
			'postId' => '发送人',
			'toId' => '接收者ID',
			'toUsername'=>'接收者',
			'status' => '状态',
			'title' => '标题',
			'content' => '内容',
			'createDate' => '时间',
		);
	}

	protected function beforeValidate(){
		if ($this->isNewRecord){
			$this->createDate= time();
			$this->status=1;
			$this->postId=Yii::app()->user->id;
		}
		return true;
	}
}