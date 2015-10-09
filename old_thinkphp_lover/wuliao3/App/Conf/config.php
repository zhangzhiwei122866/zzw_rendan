<?php
return array(

	 /* 是否开启调试模式 */
	'APP_DEBUG'    =>true,
	
	/* 数据库设置 */
    'DB_TYPE'               => 'mysql',     // 数据库类型
    'DB_HOST'               => 'localhost', // 服务器地址
    'DB_NAME'               => 'think',     // 数据库名
	'DB_PREFIX'             => 'think_',
    'DB_USER'               => 'root',      // 用户名
    'DB_PWD'                => '123456',    // 密码
    'DB_PORT'               => '3306',        // 端口
	
	 /* 默认设定 */
	'APP_GROUP_LIST' => 'Home,Admin', //项目分组设定
    'DEFAULT_GROUP'         => 'Home', // 默认分组
    'DEFAULT_MODULE'        => 'Index', // 默认模块名称
    'DEFAULT_ACTION'        => 'index', // 默认操作名称
    'DEFAULT_CHARSET'       => 'utf-8', // 默认输出编码
    'DEFAULT_TIMEZONE'      => 'PRC', // 默认时区
    'DEFAULT_AJAX_RETURN'   => 'JSON', // 默认AJAX 数据返回格式,可选JSON XML ...
    'DEFAULT_LANG'          => 'zh-cn', // 默认语言
	
	'TMPL_TEMPLATE_SUFFIX' => '.phtml',
	'URL_CASE_INSENSITIVE' => false,   // URL地址是否不区分大小写
	'LOG_RECORD' => true, // 开启日志记录
	'RUNTIME_PATH' => './App/Common/',
	'LOG_LEVEL'  =>'EMERG,ALERT,CRIT,ERR',
);
?>