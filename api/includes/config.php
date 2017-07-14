<?php
define('DB_TYPE','mysql');
// 定义数据库服务器  
define('DB_SERVER', "45.32.48.190");  
// 定义数据库名称  
define('DB_DATABASE', "demoDB");
// 定义数据库登录名  
define('DB_USER', "mimo");  
// 定义数据库登录密码  
define('DB_PWD', "jlH4G9ozLf1Iivpm");  
//定义数据库字符编码
define('DB_CHARSET',"utf8");
//定义数据库端口
define('DB_PORT',3306);
/* 
为了更高效的开发，推荐以下做法 
    1. 定义表的前缀 
    2. 用全局变量定义数据库表名 
*/ 
define('TABLE_USERS', "Users");

define('TABLE_NEWS','News');
?>