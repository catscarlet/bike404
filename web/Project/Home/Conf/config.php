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
    'LASTMODIFIED_TIME' => 1482854926,
    'BIKE404_VERSION' => '0.3.0-Beta',
    'META_KEYWORDS' => 'BIKE404,BIKE,404,BIKE404公益,自行车,被盗,公益,丢失,盗窃,开源,NotFound',

    'POST_TMP' => '/var/www/bike404/web/tmp_img/',
    'URL_ROUTER_ON' => true,
    'URL_ROUTE_RULES' => array(
        array('sitemap.xml', 'tools/sitemap', null, array('method' => 'get')),
    ),
);
