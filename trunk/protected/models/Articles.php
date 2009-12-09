<?php

class Articles extends CActiveRecord
{
	/**
	 * The followings are the available columns in table '{{Articles}}':
	 * @var integer $id
	 * @var integer $blogsId
	 * @var integer $usersId
	 * @var integer $globalArticlesCategoriesId
	 * @var integer $countReads
	 * @var integer $countComments
	 * @var integer $top
	 * @var integer $status
	 * @var string $title
	 * @var string $summary
	 * @var string $settings
	 * @var integer $createDate
	 * @var integer $updateDate
	 */
         public $content;
         protected $oldArtCate;
         protected $oldGArtCate;
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
		return '{{Articles}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('blogsId, articlesCategoryId, globalArticlesCategoriesId, title, content', 'required'),
			array('blogsId, usersId,articlesCategoryId, globalArticlesCategoriesId, countReads, countComments, top, status, createDate, updateDate', 'numerical', 'integerOnly'=>true),
			array('title', 'length', 'max'=>255),
			array('title, summary, content, top, status, articlesCategoryId, globalArticlesCategoriesId', 'safe'),
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
                    'blog'=>array(self::BELONGS_TO,'Blogs','blogsId'),
                    'user'=>array(self::BELONGS_TO,'Users','usersId'),
                    'gArtCate'=>array(self::BELONGS_TO,'GlobalArticlesCategories','globalArticlesCategoriesId'),
                    'artText'=>array(self::HAS_ONE,'ArticlesText','articlesId'),
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
			'usersId' => '用户ID',
                        'articlesCategoryId'=>'个人分类',
			'globalArticlesCategoriesId' => '全局分类',
			'countReads' => '查看数',
			'countComments' => '评论数',
			'top' => '置顶',
			'status' => '状态',
			'title' => '标题',
                        'content'=>'内容',
			'summary' => '摘要',
			'settings' => '设置',
			'createDate' => '创建时间',
			'updateDate' => '最后更新',
		);
	}

        public function getArticlesStatus($list){
            $tmpArr= array('1'=>'发布','2'=>'草稿');
            if (!is_null($list))
                return $tmpArr;
            else
                return $tmpArr[$this->status];
        }

        /**
         *
         * @return 更新时间字段
         */
        protected function beforeValidate(){
            if($this->isNewRecord){
                $this->createDate= $this->updateDate= time();
                $this->usersId= Yii::app()->user->id;
                $this->blogsId= Yii::app()->user->blogId;
            }else{
                $this->updateDate= time();
            }
            return true;
        }

        /**
         * 记录一下是否更改了类别便于保存前更新相应类别的统计
         */
        protected function afterFind(){
            $this->oldArtCate = $this->articlesCategoryId;
            $this->oldGArtCate= $this->globalArticlesCategoriesId;
        }
        /**
         * 这里更新一下文章分类和全局文章分类的统计
         * @return true
         */
        protected function beforeSave(){
            if ($this->isNewRecord){
                $this->dbConnection->createCommand('update {{articlescategories}} set countArticles=countArticles+1 WHERE id='.$this->articlesCategoryId)->execute();
                $this->dbConnection->createCommand('update {{globalarticlescategories}} set countArticles=countArticles+1 WHERE id='.$this->globalArticlesCategoriesId)->execute();
            }elseif ($this->oldArtCate!=$this->articlesCategoryId){
                $this->dbConnection->createCommand('update {{articlescategories}} set countArticles=countArticles+1 WHERE id='.$this->articlesCategoryId)->execute();
                $this->dbConnection->createCommand('update {{articlescategories}} set countArticles=countArticles-1 WHERE id='.$this->oldArtCate)->execute();
            }elseif ($this->oldGArtCate!=$this->globalArticlesCategoriesId){
                $this->dbConnection->createCommand('update {{globalarticlescategories}} set countArticles=countArticles+1 WHERE id='.$this->globalArticlesCategoriesId)->execute();
                $this->dbConnection->createCommand('update {{globalarticlescategories}} set countArticles=countArticles-1 WHERE id='.$this->oldGArtCate)->execute();
            }
            return true;
        }

}