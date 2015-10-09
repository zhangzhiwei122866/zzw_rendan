<?php
define('THINK_PATH', realpath('./../ThinkPHP'));  // 定义ThinkPHP框架路径
define('APP_NAME', 'lover');
define('APP_PATH', './lover');
define('STRIP_RUNTIME_SPACE', false);    //禁止runtime.php过滤空格
define('NO_CACHE_RUNTIME', true);        //禁止生成runtime.php
define('APP_DEBUG', true);				 //开启调试模式
require (THINK_PATH . "/ThinkPHP.php");   // 加载框架入口文件
App::run();
