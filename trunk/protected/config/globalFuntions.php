<?php

defined('DS') or define('DS',DIRECTORY_SEPARATOR);
 
function app(){
    return Yii::app();
}
 
function cs(){
    return Yii::app()->getClientScript();
}
 
function user() {
    return Yii::app()->getUser();
}
 
function url($route,$params=array(),$ampersand='&'){
    return Yii::app()->createUrl($route,$params,$ampersand);
}
 
function h($text){
    return htmlspecialchars($text,ENT_QUOTES,Yii::app()->charset);
}
 
function l($text, $url = '#', $htmlOptions = array()) {
    return CHtml::link($text, $url, $htmlOptions);
}
 
function t($message, $category = 'stay', $params = array(), $source = null, $language = null) {
    return Yii::t($category, $message, $params, $source, $language);
}
 
function bu($url=null){
    static $baseUrl;
    if ($baseUrl===null)
            $baseUrl=Yii::app()->getRequest()->getBaseUrl();
    return $url===null ? $baseUrl : $baseUrl.'/'.ltrim($url,'/');
}
 
function param($name){
    return Yii::app()->params[$name];
}

function myDebug($arr,$end=true, $funcName='print_r'){
    echo '<br /><pre>';
    $funcName($arr);
    echo '</pre><br />';
    if ($end)
        exit();
}




