<?php

class DController extends CController
{
        //存用户信息
        public $_user;
        //存blog信息
        public $_blog;

         /**
         * 为本控制器做初始化操作
         */
         public function init(){
                //先执行父级初始化
                
                parent::init();
                //设置本控制器使用的皮肤
                if (isset($_GET['username'])){
                        $user= Users::model()->with('blogs','userinfo','blogCategory','friends','visits')->find('t.username=:username', array(':username'=>$_GET['username']));
                        $this->_user= $user;
                        $this->_blog= $user->blogs;
                        $theme= $user->blogs->settings['theme']['name'];
                        $user= null;
                        //unset($user);
                }elseif (isset($_GET['uid'])){
                        $blog= Blogs::model()->with('users')->find('usersId=:uid',array(':uid'=>intval($_GET['uid'])));
                        $this->_user= $blog->users;
                        $this->_blog= $blog;
                        $theme= $blog->settings['theme']['name'];
                        $blog= null;
                        //unset($blog);
                }

                if (!$this->_user && $this->getId()!='users')
                        throw new CHttpException(404,'URL无效');
                if (empty($theme))
                        $theme='default';
                Yii::app()->setTheme($theme);
				//mydebug(Yii::app(),1);
				$baseCssFile= Yii::app()->getTheme()->getBaseUrl().'/css/base.css';
				if (!empty($this->_blog->settings['theme']['style'])){
					$cssFile= Yii::app()->getTheme()->getBaseUrl().'/css/'.$this->_blog->settings['theme']['style'];
				}else{
					$theme= Yii::app()->getThemeManager()->getTheme($theme);//得到制定的theme对象
					$themeConfig= require_once($theme->getBasePath().DS.'config.php');//获取指定theme中的配置文件
					$cssFile= Yii::app()->getTheme()->getBaseUrl().'/css/'.$themeConfig['defaultStyle'];
				}
				Yii::app()->clientScript->registerCssFile($baseCssFile);
				Yii::app()->clientScript->registerCssFile($cssFile);
                //如果当前用户是所有者则设置个标识
                if (Yii::app()->user->id== $this->_user->id)
                        Yii::app()->user->setState('isOwner',1);
                else
                        Yii::app()->user->setState('isOwner',0);

                //插入最近查看数据
                //当当前用户是登录用户，并且不是自己，并且当前会话只记录一次！
                if ((!Yii::app()->user->isGuest) && Yii::app()->user->id!=$this->_user->id && Yii::app()->user->getState('view'.$this->_user->id)!='1'){
                        //如果当前用户查看过此用户则更新当前用户
                        $num= Visits::model()->updateAll(array('userId'=>Yii::app()->user->id, 'visitId'=>$this->_user->id, 'visitDate'=>time()),
                                                               'userId=:uid AND visitId=:vid ORDER BY visitDate ASC LIMIT 1',
                                                               array('uid'=>Yii::app()->user->id,':vid'=>$this->_user->id)
                                                        );
                        if ($num==0){
                                $vCount= Visits::model()->count('visitId=:vid',array(':vid'=>$this->_user->id));
                                if ($vCount>=12){
									//如果用户数大于12则更新前面的记录
									//否则更新最前面的一条
									Visits::model()->updateAll(array('userId'=>Yii::app()->user->id, 'visitId'=>$this->_user->id, 'visitDate'=>time()),
                                                                 'visitId=:vid ORDER BY visitDate ASC LIMIT 1',
                                                                 array(':vid'=>$this->_user->id)
                                                           );
                                }else{
									//否则插入新的记录
									$visit= new Visits;
									$visit->userId = Yii::app()->user->id;
									$visit->visitId= $this->_user->id;
									$visit->save();
                                }
                        }
                        Yii::app()->user->setState('view'.$this->_user->id,'1');
                }
        }
}