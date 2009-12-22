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

function Generate_Brief($text){
	//生成摘要
	global $Briefing_Length;
	mb_regex_encoding("UTF-8");
	if(mb_strlen($text) <= BRIEF_LENGTH ) return $text;
	$Foremost = mb_substr($text, 0, BRIEF_LENGTH);

	$re = "<(\/?)(P|DIV|H1|H2|H3|H4|H5|H6|ADDRESS|PRE|TABLE|TR|TD|TH|INPUT|SELECT|TEXTAREA|OBJECT|A|UL|OL|LI|BASE|META|LINK|HR|BR|PARAM|IMG|AREA|INPUT|SPAN)[^>]*(>?)";
	$Single = "/BASE|META|LINK|HR|BR|PARAM|IMG|AREA|INPUT|BR/i";

	$Stack = array(); $posStack = array();

	mb_ereg_search_init($Foremost, $re, 'i');

	while($pos = mb_ereg_search_pos()){
		$match = mb_ereg_search_getregs();
		/*    [Child-matching Formulation]:

		$matche[1] : A "/" charactor indicating whether current "<...>" Friction is Closing Part
		$matche[2] : Element Name.
		$matche[3] : Right > of a "<...>" Friction
		*/

		if($match[1]==""){
			$Elem = $match[2];
			if(mb_eregi($Single, $Elem) && $match[3] !=""){
				continue;
			}
			array_push($Stack, mb_strtoupper($Elem));
			array_push($posStack, $pos[0]);
		}else{
			$StackTop = $Stack[count($Stack)-1];
			$End = mb_strtoupper($match[2]);
			if(strcasecmp($StackTop,$End)==0){
				array_pop($Stack);
				array_pop($posStack);
				if($match[3] ==""){
					$Foremost = $Foremost.">";
				}
			}
		}
	}

	$cutpos = array_shift($posStack) - 1;
	$Foremost =  mb_substr($Foremost,0,$cutpos,"UTF-8");
	return $Foremost;
}
