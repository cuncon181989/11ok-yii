<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'11ok.net',
	'language'=>'zh_cn',
	'timeZone' => 'Asia/Shanghai',
        'theme'=>'defalut',
        //'defaultController'=>'site',

	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
	),

	// application components
	'components'=>array(
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error,info',
				),
				array(
					'class'=>'CWebLogRoute',
					'levels'=>'trace, info, profile, error, warning',
				),
			),
		),
		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
		),
		// uncomment the following to set up database
		'db'=>array(
                        'class'=>'CDbConnection',
                        'connectionString'=>'mysql:host=localhost;dbname=11ok_yii',
                        'charset'=>'utf8',
                        'username'=>'webuser',
                        'password'=>'webuser',
                        'tablePrefix'=>'y11ok_',
                        'enableParamLogging'=>true,
                ),
                'themeManager'=>array(
                        
                ),
                /**
                'urlManager'=>array(
                        'urlFormat'=>'path',
                        'urlSuffix'=>'.html',
                        'showScriptName'=>false,
                ),
                'cache'=>array(
                        'class'=>'system.caching.CFileCache',
                        'cacheFileSuffix'=>'.html',
                        'directoryLevel'=>1,
                ),
                /**/
                'thumb'=>array(
                        'class'=>'ext.phpthumb.EasyPhpThumb',
                ),
                'CFile'=>array(
                        'class'=>'ext.CFile',
                ),
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'admin@11ok.net',
                //用户上传的目录
                'uploadDir' =>'uploads',
                //头像大小
                'smallAvatar' =>42,
                'mediumAvatar'=>85,
                //相册图片缩放大小
                'galleryWidth' =>600,  
                'galleryHeight'=>600,
                //相册的缩略图大小
                'gallerySWidth' =>160, 
                'gallerySHeight'=>120,
                //
	),
);