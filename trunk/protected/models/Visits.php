<?php

class Visits extends CActiveRecord
{
	/**
	 * The followings are the available columns in table '{{Visits}}':
	 * @var integer $id
	 * @var integer $userId
	 * @var integer $visitId
	 * @var integer $visitDate
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
		return '{{visits}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
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
			'userId' => '查看者UID',
			'visitId' => '查看UID',
			'visitDate' => '日期',
		);
	}
        /**
         * @return 更新时间字段
         */
        protected function beforeValidate(){
            //不管是新插入还是更新都应该记录当前时间
            $this->visitDate= time();
            return true;
        }

}