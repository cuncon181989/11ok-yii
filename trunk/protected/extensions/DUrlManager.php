<?php
/**
 * DUrlManager class file
 * @author dufei22 <dufei22@gmail.com>
 * @license http://www.yiiframework.com/license/
 */

class DUrlManager extends CUrlManager
{
        public function createUrl($route, $params=array(), $ampersand='&')
        {
            //这里为每个url都加入当前登录的用户名。
            if(!Yii::app()->user->isGuest){
                    $params['username']=Yii::app()->user->name;
            }
            return parent::createUrl($route,$params,$ampersand);
        }

}