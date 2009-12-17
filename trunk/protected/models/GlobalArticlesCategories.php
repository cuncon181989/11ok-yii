<?php

class GlobalArticlesCategories extends CActiveRecord
{
	/**
	 * The followings are the available columns in table '{{GlobalArticlesCategories}}':
	 * @var integer $id
	 * @var string $name
	 * @var string $description
	 * @var string $settings
	 * @var integer $countArticles
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
		return '{{GlobalArticlesCategories}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('countArticles', 'numerical', 'integerOnly'=>true),
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
			'name' => 'Name',
			'description' => 'Description',
			'settings' => 'Settings',
			'countArticles' => 'Count Articles',
		);
	}
        /**
         *
         */
        protected function afterFind(){
            $this->settings  = unserialize($this->settings);
        }
        /**
         * @return true
         */
        protected function beforeSave(){
            $this->settings= serialize($this->settings);
            return true;
        }
}