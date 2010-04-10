<?php

class ArticlesComments extends CActiveRecord
{
	/**
	 * The followings are the available columns in table '{{ArticlesComments}}':
	 * @var integer $id
	 * @var integer $blogsId
	 * @var integer $articlesid
	 * @var integer $parentId
	 * @var integer $usersId
	 * @var integer $private
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
		return '{{articlescomments}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('userName, title, content', 'required'),
			array('userEmail', 'email'),
			array('userUrl', 'url'),
			array('articlesId, private, status', 'numerical', 'integerOnly'=>true),
			array('userName, userEmail, userUrl, title', 'length', 'max'=>255),
			array('content', 'length', 'min'=>6),
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
			'id' => 'Id',
			'blogsId' => '博客ID',
			'articlesid' => '文章ID',
			'parentId' => '父ID',
			'usersId' => '用户ID',
			'private' => '不公开',
			'userName' => '用户名',
			'userEmail' => 'Email',
			'userUrl' => '网址',
			'title' => '标题',
			'content' => '内容',
			'clientIp' => '发布IP',
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

        protected function beforeSave(){
                return true;
        }

		protected function afterDelete(){
			Articles::model()->updateCounters(array('countComments'=>-1), 'id=:aid',array(':aid'=>$this->articlesId));
		}
}