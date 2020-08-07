<?php

# Убрать в отдельный файл со всеми глоб переменными
#$ROOT_PATH = $_SERVER['DOCUMENT_ROOT'];



include "s-script/backend_includer.php";
include "s-script/frontend_includer.php";

# проинклудить все backend-includes  проекта

include "project/project_routes.php";
$path_to_page_init = Paginator::getRouteToFile( $ROUTES );
//echo "<pre>"; var_dump( $path_to_page_init ); echo "</pre>"; exit("proj index");




include "project/project_config.php";



include "project/project_db.php";
$PDO = new PDO_C( PDO_C::buildConnString($DB_CONFIG), $DB_CONFIG['username'], $DB_CONFIG['password'] );    
//echo ( $PDO->checkConnection() ) ? "Yes" :  "No";




# Где-то здесь надо запустить сессию
/*
session_start();

if (!isset( $_SESSION["logged_user"] ) )
	$_SESSION["logged_user"] = false;  # Просто создаю поле если его нет
*/


//exit($path_to_page_init);

include $path_to_page_init;




?>