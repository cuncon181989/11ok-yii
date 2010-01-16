<?php
/**
 * DUrlManager class file
 * @author dufei22 <dufei22@gmail.com>
 * @license http://www.yiiframework.com/license/
 */

class DUrlManager extends CUrlManager{
        public function createUrl($route, $params=array(), $ampersand='&') {
            //已登录并且是DController的子类并且没有设置username参数
            if(get_parent_class(Yii::app()->controller)=='DController' && !isset($params['username'])){
                    $params['username']=Yii::app()->controller->_user->username;
            }
            return parent::createUrl($route,$params,$ampersand);
        }

}