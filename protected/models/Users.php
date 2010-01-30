<?php

class Users extends CActiveRecord
{
	/**
	 * The followings are the available columns in table '{{Users}}':
	 * @var integer $id
	 * @var string $username
	 * @var string $password
	 * @var string $email
	 * @var string $avatar
	 * @var string $realname
	 * @var string $compnay
	 * @var integer $sex
	 * @var string $birthday
	 * @var integer $userType
	 * @var integer $userStatus
	 * @var string $lastLoginDate
	 * @var string $regIp
	 * @var string $lastLoginIp
	 * @var string $regDate
	 */
	public $password2;
	public $verifyCode;
	public $oldBlogCate;//标记用户旧行业，更新的时候用来判断用户是否改变来分类来做相应分类统计的加减
	public $r_realname;
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
		return '{{users}}';
	}
	
	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('username, password, password2, realname, compnay, verifyCode, province, city, area, blogCategoryId, oldBlogCate, userType, avatar, sex, birthday','safe'),
			array('email, province, blogCategoryId', 'required'),
			array('top_trade, top_site','safe', 'on'=>'admin'),
			array('birthday','type','type'=>'date','dateFormat'=>'yyyy-mm-dd','message'=>'生日必须为正确的日期格式！'),
			array('avatar', 'file', 'types'=>'jpg, gif, png','maxSize'=>'128000','tooLarge'=>'文件大小不能超过128K','allowEmpty'=>TRUE),
			array('avatar', 'length', 'max'=>255),
			array('username, password', 'required', 'on'=>'register'),
			array('username', 'length', 'min'=>4, 'max'=>25 ),
			array('username', 'match', 'pattern'=>'/^[\w]+$/', 'message'=>'用户名只能是字母数字下划线！' ),
			array('username', 'unique','className'=>'users','attributeName'=>'username'),
			array('password', 'length', 'min'=>4, 'max'=>32),
			array('password2', 'compare', 'compareAttribute'=>'password', 'on'=>'register'),
			array('email', 'email'),
			array('sex', 'in', 'range'=>array(0,1,2)),
                        array('verifyCode', 'captcha', 'allowEmpty'=>!extension_loaded('gd'), 'on'=>'register'),
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
                    'blogCategory'=>array(self::BELONGS_TO,'BlogCategories','blogCategoryId'),
                    'blogs'=>array(self::HAS_ONE,'Blogs','usersId'),
                    'userinfo'=>array(self::HAS_ONE,'UserInfo','usersId'),
                    'friends'=>array(self::MANY_MANY,'Users','{{friends}}(userId,friendId)', 'limit'=>5),
                    'visits'=>array(self::MANY_MANY,'Users','{{visits}}(visitId,userId)', 'limit'=>16),
		    'articlesCategory'=>array(self::HAS_MANY,'ArticlesCategories','usersId'),
		    'galleryAlbums'=>array(self::HAS_MANY,'GalleryAlbums','usersId'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'Id',
			'username' => '登录名',
			'password' => '密码',
			'password2' => '重复密码',
			'email' => 'Email',
			'avatar' => '头像',
			'realname' => '真实姓名',
			'compnay' => '所在企业',
			'sex' => '性别',
			'province'=>'所在地',
			'city'=>'市',
			'area'=>'区',
			'blogCategoryId'=>'行业',
			'birthday' => '生日',
			'userType' => '类型',
			'userStatus' => '状态',
			'top_trade'=>'行业推荐',
			'top_site'=>'全站推荐',
			'settings'=>'设置',
			'verifyCode'=>'验证码',
			'lastLoginDate' => '最后登陆时间',
			'regIp' => '注册IP',
			'lastLoginIp' => '最后登陆IP',
			'regDate' => '注册时间',
		);
	}
        /**
         *
         * @return 更新时间字段
         */
        protected function beforeValidate(){
            if($this->isNewRecord){
                $this->regDate= $this->lastLoginDate= time();
                $this->userStatus=1;
                $http1=new CHttpRequest();
                $this->regIp= Yii::app()->getRequest()->getUserHostAddress();
            }else{
                $this->lastLoginDate= time();
                $http1=new CHttpRequest();
                $this->lastLoginIp= Yii::app()->getRequest()->getUserHostAddress();
            }
			if (empty($this->realname))
				$this->realname=null;
				
            return true;
        }
        /**
         * @action 记录一下用户行业，便于后面更新行业的博客统计
         */
        protected function afterFind(){
            $this->oldBlogCate= $this->blogCategoryId;
            $this->settings= unserialize($this->settings);
			$this->r_realname= $this->realname;
            if ($this->realname=='') $this->realname= $this->username;
        }
        /**
         * 这里更新一下行业统计字段
         * @return true
         */
        protected function beforeSave(){
            if ($this->isNewRecord){
                $this->dbConnection->createCommand('update {{blogcategories}} set countBlogs=countBlogs+1 WHERE id='.$this->blogCategoryId)->execute();
            }elseif ($this->oldBlogCate!=$this->blogCategoryId){
                $this->dbConnection->createCommand('update {{blogcategories}} set `countBlogs`=`countBlogs`+1 WHERE id='.$this->blogCategoryId)->execute();
                $this->dbconnection->createCommand('update {{blogcategories}} set `countBlogs`=`countBlogs`-1 WHERE id='.$this->oldBlogCate)->execute();
            }
            $this->settings= serialize($this->settings);
            return true;
        }
        /**
         * 用户更新行业的时候同时更新一下博客表的行业，使其同步
         */
        protected function afterSave(){
            //用户更新行业的时候同时更新一下博客表的行业，使其同步
            $this->dbConnection->createCommand('update {{blogs}} set blogCategoryId='.$this->blogCategoryId.' WHERE usersId='.$this->id)->execute();
			if ($this->isNewRecord){
				$blog= new UserInfo;
				$blog->usersId= $this->id;
				$blog->save(false);
			}
        }
        /**
         * 删除用户的时候减少相应行业统计
         */
        protected function beforeDelete(){
                $this->dbconnection->createCommand('update {{blogcategories}} set `countBlogs`=`countBlogs`-1 WHERE id='.$this->blogCategoryId)->execute();
        }
        /**
         * @return string 用户性别
         * @return array 性别列表
         */
        public function getUserSex($list=null){
            $tmpArr= array('0'=>'保密','1'=>'男','2'=>'女');
            if (!is_null($list))
                return $tmpArr;
            else
                return $tmpArr[$this->sex];
        }
        /**
         * @return string 头像目录
         * @fullpath 是否完全路径，不完全路径主要thumb组件用
         */
        public function getAvatarDir($fullpath=true){
            if ($fullpath)
                return Yii::getPathOfAlias('webroot').DS.Yii::app()->params['uploadDir'].DS.$this->id.DS;
            else
                return DS.Yii::app()->params['uploadDir'].DS.$this->id;
                //return Yii::app()->getBasePath().DS.'..'.DS.Yii::app()->params['uploadDir'].DS.$this->id.DS;
        }
        /**
         *  @return string 头像url路径包含文件名
         */
        public function getAvatarUrl($size='medium'){
                $avatar= $this->getAvatarImg($size);
                if ($avatar=='noavatar1.jpg' || $avatar=='noavatar2.jpg')
                        return Yii::app()->getRequest()->getBaseUrl().'/images/'.$avatar;
                else
                        return Yii::app()->getRequest()->getBaseUrl().'/'.Yii::app()->params['uploadDir'].'/'.$this->id.'/'.$avatar;
        }
        /**
         * @param string $size 头像的大小
         * @return string 根据大小返回头像文件名，不含路径，要完整路径请用getAvatarUrl
         */
        public function getAvatarImg($size='medium'){
            if (!empty($this->avatar)){
                //如果有头像则根据$size输入大中小图
                if ($size=='medium')
                    return 'mediumAvatar.'.substr($this->avatar,-3);
                elseif ($size=='small')
                    return 'smallAvatar.'.substr($this->avatar,-3);
                else
                    return $this->avatar;
            }else{
                //没有上传头像则根据性别输出男女图
                if($this->getUserSex()=='男')
                        return 'noavatar1.jpg';
                else
                        return 'noavatar2.jpg';
            }
                
        }
        /**
         *
         * @param string $list 标记一下是输出列表还是用户的性别对应的文字
         * @return 根据$list返回相应的数据
         */
        public function getUserStatus($list=null){
            $tmpArr= array('0'=>'未激活','1'=>'正常','2'=>'资料错误','3'=>'管理员暂停');
            if (!is_null($list))
                return $tmpArr;
            else
                return $tmpArr[$this->userStatus];
        }
}