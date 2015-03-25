<?php
return array(
	//'配置项'=>'配置值'
	/* 数据库设置 */
    'DB_TYPE'               =>  'mysql',     // 数据库类型
    'DB_HOST'               =>  '121.42.31.5', // 服务器地址
    'DB_NAME'               =>  'bmw',          // 数据库名
    'DB_USER'               =>  'root',      // 用户名
    'DB_PWD'                =>  'Yuruian2015',      // Yuruian2015
    'DB_PORT'               =>  '3306',        // 端口
    'DB_PREFIX'             =>  'bmw_',    // 数据库表前缀
   
    //显示页面Trace信息
    'SHOW_PAGE_TRACE' =>true, 


    //auth 权限认证
    'AUTH_CONFIG' => array(
        'AUTH_ON'           => true,                      // 认证开关
        'AUTH_TYPE'         => 1,                         // 认证方式，1为实时认证；2为登录认证。
        'AUTH_GROUP'        => 'bmw_auth_group',        // 用户组数据表名
        'AUTH_GROUP_ACCESS' => 'bmw_auth_group_access', // 用户-用户组关系表
        'AUTH_RULE'         => 'bmw_auth_rule',         // 权限规则表
        'AUTH_USER'         => 'bmw_manager'             // 用户信息表
    ),

    'DB_SQL_BUILD_CACHE' => true,  //开启SQL解析缓存
    'DB_SQL_BUILD_LENGTH' => 20,   // SQL缓存的队列长度
	
	'URL_HTML_SUFFIX'=>'html',

);