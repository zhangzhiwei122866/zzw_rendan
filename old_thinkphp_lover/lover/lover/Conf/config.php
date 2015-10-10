<?php
return array(
	'APP_DEBUG'           => false,    									// 开启调试模式
    'APP_FILE_CASE'       => true,  									 	 // 是否检查文件的大小写 对Windows平台有效
    'TMPL_STRIP_SPACE'    => false,   								 // 是否去除模板文件里面的html空格与换行
	'TOKEN_ON'=>true, 													 // 是否开启令牌验证
	'TOKEN_TYPE'=>'md5', 												 //令牌哈希验证规则 默认为MD5
    'NO_CACHE_RUNTIME'  =>  true,										//不生成核心文件 
   'APP_GROUP_LIST'      =>'Admin,Default',
    'DEFAULT_GROUP'       =>'Default',
	'DEFAULT_AJAX_RETURN'=>  'JSON',
	'DEFAULT_CHARSET'       => 'utf-8', // 默认输出编码
	'DB_FIELD_CACHE'=>false,
	'HTML_CACHE_ON'=>false,
    'URL_MODEL'           => 2, 
	'URL_HTML_SUFFIX'     => '.html',  								// URL伪静态后缀设置
   // 'URL_CASE_INSENSITIVE' =>true,								// 实现URL访问不再区分大小写
	'DEFAULT_FILTER'=>'htmlspecialchars,strip_tags',   		//会依次对变量进行htmlspecialchars和strip_tags方法过滤后返回结果
	//'SESSION_AUTO_START' =>true,
/* 数据库配置 */

	'DB_TYPE'             => 'mysql',  // 数据库类型
	'DB_HOST'             => 'localhost', // 数据库服务器地址
	'DB_NAME'             => 'lover', // 数据库名称
	'DB_USER'             => 'root',  // 数据库用户名
    'DB_PWD'              => '123456', // 数据库密码
	'DB_PORT'             => '3306', // 数据库端口
	'DB_FIELDTYPE_CHECK'  => false,   // 是否进行字段类型检查
	'DB_PREFIX'           => '',   // 数据库表前缀
/*  memcached配置 */
	 //'SESSION_PREFIX' => 'sess_',
	//定义session为memcache
	'SESSION_TYPE' => 'Memcache',
	//Memcache服务器
	'MEMCACHE_HOST' => '127.0.0.1',
	//Memcache端口
	'MEMCACHE_PORT' => 11211,
	//Memcache的session信息有效时间
	//'SESSION_EXPIRE' => 10,
/* session配置	*/
	//'SESSION_TYPE' => 'memcache',
	'SESSION_HOST'	=> '127.0.0.1', //填写memcache服务器地址
	'SESSION_PORT'=>11211, //memcache端口,默认11211
	'SESSION_EXPIRE'=>	604800, //session过期时间(秒)
	'SESSION_TIMEOUT'=> 60, //memcache连接超时时间,默认60秒
);