<?php

return array(
    'DB_TYPE' => 'mysql',
    'DB_HOST' => '127.0.0.1',
    'DB_NAME' => 'newProject',
    'DB_USER' => 'newProject',
    'DB_PWD' => 'newProject',
    'DB_PORT' => '3306',

    'SITE_URL' => 'http://192.168.214.130/bike404/web/index.php/Home/',
    'IMG_PREFIX' => 'http://192.168.214.130/bike404/web/Public/temp/',
    //'IMGTHUMBNAIL_PREFIX'    => 'http://192.168.214.130/ImageThumbnail/index.php?img=',
    'LASTMODIFIED_TIME' => 1463487016,
    'BIKE404_VERSION' => 'v0.0.7-Pre_Alpha',
    'META_KEYWORDS' => 'BIKE404,BIKE,404,BIKE404����,���г�,����,����,��ʧ,����,��Դ,NotFound',

    'URL_ROUTER_ON' => true,
    'URL_ROUTE_RULES' => array(
        array('sitemap.xml', 'tools/sitemap', null, array('method' => 'get')),
    ),
);
